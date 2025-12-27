<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

trait VideoLinkTrait
{
    public function videoEmbed(string $url): ?string
    {
        // Google Drive
        if (str_contains($url, 'drive.google.com')) {
            if (preg_match('/\/d\/([^\/]+)/', $url, $m)) {
                return "https://drive.google.com/file/d/{$m[1]}/preview";
            }
            return null;
        }

        // YouTube
        if (
            str_contains($url, 'youtube.com') ||
            str_contains($url, 'youtu.be')
        ) {
            if (preg_match('/(youtu\.be\/|v=)([^&]+)/', $url, $m)) {
                return "https://www.youtube.com/embed/{$m[2]}";
            }
            return null;
        }

        // Dropbox
        if (str_contains($url, 'dropbox.com')) {
            return str_replace('?dl=0', '?raw=1', $url);
        }

        // OneDrive
        if (str_contains($url, 'onedrive.live.com')) {
            return $url;
        }

        // Archive.org
        if (str_contains($url, 'archive.org')) {
            if (preg_match('#archive\.org/(details|download)/([^/]+)/(.+)$#', $url, $m)) {
                return "https://archive.org/embed/{$m[2]}/{$m[3]}";
            }
            return str_replace('/details/', '/embed/', $url);
        }

        // Direct video
        if (preg_match('/\.(mp4|mkv|webm|ogg)$/i', $url)) {
            return $url;
        }

        return null;
    }

    public function isLinkAccessible(string $url): bool
    {
        try {
            $response = Http::timeout(8)->get($url);

            if (!$response->successful()) {
                return false;
            }

            $body = $response->body();

            $blockedKeywords = [
                'melanggar Persyaratan Layanan',
                'You do not have access',
                'Sorry. You can’t access this item',
                'cannot be accessed',
            ];

            foreach ($blockedKeywords as $keyword) {
                if (stripos($body, $keyword) !== false) {
                    return false;
                }
            }

            return true;
        } catch (\Throwable) {
            return false;
        }
    }

    /**
     * Get valid embed URL
     */
    public function getValidEmbedLinks(): array
    {
        $valid = [];

        foreach ($this->link ?? [] as $url) {
            $embed = $this->videoEmbed($url);

            if ($embed && $this->isLinkAccessible($embed)) {
                $valid[] = $embed;
            }
        }

        return $valid;
    }

    /**
     * Count the number of broken links
     */
    public function getBrokenLinksCount(): int
    {
        $count = 0;

        foreach ($this->link ?? [] as $url) {
            $embed = $this->videoEmbed($url);

            if (!$embed || !$this->isLinkAccessible($embed)) {
                $count++;
            }
        }

        return $count;
    }
}
