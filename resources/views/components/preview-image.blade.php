<script>
    function previewImage() {
        var input = document.getElementById('image-input');
        var preview = document.getElementById('image-preview');

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = '{{ asset('assets/profile/default.png') }}';
        }
    }

    document.getElementById('image-input').addEventListener('change', previewImage);
    window.addEventListener('load', previewImage);
</script>
