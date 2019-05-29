<template>
    <div class="editor">
        <textarea name="editor" id="editor" rows="10" cols="80">请输入内容...</textarea>
    </div>
</template>
<script>
    export default {
        props: {

        },
        data () {
            return {}
        },
        mounted () {
            this.initCKEditor()
        },
        beforeDestroy() {
            CKEDITOR.instances.editor.destroy();
        },
        methods: {
            initCKEditor: function () {
                CKEDITOR.replace('editor', {
                    height:770,
                    codeSnippet_theme: 'zenburn',
                    //filebrowserImageUploadUrl: HTTP_ROOT_PATH+'/blog/article/ckUpload'	 // 图片上传路径
                });
            },
            getValue: function (){
                return CKEDITOR.instances.editor.getData();
            },
            setValue: function(content){
                CKEDITOR.instances.editor.setData(content);
            }
        }
    }
</script>