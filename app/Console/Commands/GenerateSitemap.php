<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Category;
use App\Models\Video;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate dynamic sitemap.xml';

    public function handle()
    {
        $sitemap = Sitemap::create();

        /** =====================
         * STATIC PAGES
         ===================== */
        $staticPages = [
            '/home',
            '/video',
            '/history',
            '/bookmark',
        ];

        foreach ($staticPages as $page) {
            $sitemap->add(
                Url::create($page)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority(0.9)
            );
        }

        /** =====================
         * CATEGORY PAGES
         * /video/{franchise}/{category}
         ===================== */
        Category::with('franchise')
            ->whereNull('deleted_at')
            ->get()
            ->each(function ($category) use ($sitemap) {

                if (!$category->franchise) return;

                $sitemap->add(
                    Url::create(route('video.show', [
                        $category->franchise->slug,
                        $category->slug
                    ]))
                        ->setLastModificationDate($category->updated_at)
                        ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                        ->setPriority(0.8)
                );
            });

        /** =====================
         * WATCH PAGES (MAIN)
         * /video/{franchise}/{category}/{type}/{number}
         ===================== */
        Video::with('category.franchise')
            ->whereNull('deleted_at')
            ->chunk(500, function ($videos) use ($sitemap) {

                foreach ($videos as $video) {

                    if (!$video->category || !$video->category->franchise) continue;

                    $sitemap->add(
                        Url::create(route('video.watch', [
                            $video->category->franchise->slug,
                            $video->category->slug,
                            $video->type,
                            $video->number,
                        ]))
                            ->setLastModificationDate($video->updated_at)
                            ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
                            ->setPriority(1.0)
                    );
                }
            });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('✅ Sitemap generated.');
    }
}
