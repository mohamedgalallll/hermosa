<script src="{{url('design/admin/vendors/js/extensions/dropzone.min.js')}}"></script>
<script>
    Dropzone.autoDiscover = false;
    $(document).ready(function () {
        myDropzone =   $('.dropzone').dropzone({
            url:"{{url()->current()}}/gallery/add",
            paramName:'image',
            uploadMultiple:false,
            maxFiles:15,
            maxFilessize:2,
            acceptedFiles: ".png,.jpg,.jpeg",
            dictDefaultMessage:'Drop Your Photos here Or Click and Select It..',
            addRemoveLinks:true,
            dictRemoveFile:'Delete',
            removedfile:function(file){
                $.ajax({
                    dataType:'json',
                    type:'post',
                    url : '{{url()->current()}}/gallery/delete',
                    data:{_token:'{{csrf_token()}}', image_id:file.fid}
                });
                var fmock;
                return ( fmock = file.previewElement) != null ? fmock.parentNode.removeChild(file.previewElement) :void 0;
            },
            sending: function(file, response, formData) {
                console.log(response.response);
                formData.append("fid", response);
                formData.append("_token", '{{csrf_token()}}');
            },
           init:function () {
                    @foreach($images as $image)
                var mockFile = {fid:'{{$image->id}}'};
                this.emit('addedfile', mockFile);
                this.options.thumbnail.call(this, mockFile, "{{url('storage' . $image->path)}}");
                @endforeach
            }
        });
    });
</script>
