<x-label for="{{$inputId}}" value="Image (optional)" />
<label for="{{$inputId}}" id="{{$labelId}}" class="border w-full border-gray-800 py-1 px-2 rounded-sm hover:bg-gray-800 hover:text-white">
    Choose image
</label>
<input name="image" class="hidden" id="{{$inputId}}" type="file"/>
<script>
    window.addEventListener('load', event => {
        document.getElementById('{{$inputId}}').addEventListener('change', function(){
            document.getElementById('{{$labelId}}').textContent = this.files[0].name
        })
    });
</script>