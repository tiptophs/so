<template>
   <div class="upload-img">
       <img id="bak-img" class="bak-img" src="./img/preview.jpg"/>
       <div class="button-operation pull-right">
           <button class="btn btn-primary" @click="upload">上传</button>
           <button class="btn btn-primary" @click="removeImg">删除</button>
       </div>

       <input type="file" name="ass-upload" id="ass-upload" class="hidden" @change="getFile($event)"/>
   </div>
</template>

<script>
    export default {
        name: 'upload',
        data () {
            return {
                file:''
            }
        },
        methods: {
            upload: function(){
                document.getElementById('ass-upload').click();
            },
            removeImg: function(){
                document.getElementById('bak-img').src = '/static/img/preview.3f4a5e4.jpg';
                document.getElementById('ass-upload').value = '';
            },
            getFile: function(event){
                this.file = event.target.files[0];
                //console.log(this.file);
            }
        },
        mounted() {

            document.getElementById('ass-upload').onchange = function(){
                //判断浏览器是否支持FileReader接口
                if (typeof FileReader == 'undefined') {
                    alert('当前浏览器不支持FileReader接口, 图片无法预览...');
                    return false;
                }
                xmTanUploadImg(document.getElementsByName('ass-upload')['0']);
            }


            //选择图片，马上预览
            let xmTanUploadImg = function(obj) {
                var file = obj.files[0];

                //console.log(obj);console.log(file);
                //console.log("file.size = " + file.size);  //file.size 单位为byte

                var reader = new FileReader();

                //读取文件过程方法
                reader.onloadstart = function (e) {
                    console.log("开始读取....");
                }
                reader.onprogress = function (e) {
                    console.log("正在读取中....");
                }
                reader.onabort = function (e) {
                    console.log("中断读取....");
                }
                reader.onerror = function (e) {
                    console.log("读取异常....");
                }
                reader.onload = function (e) {
                    console.log("成功读取....");
                    var img = document.getElementById("bak-img");
                    console.log(e);
                    img.src = e.target.result;
                    //或者 img.src = this.result;  //e.target == this
                }
                reader.readAsDataURL(file)
            }
        }
    }
</script>

<style scoped>
    .upload-img {
        border: 1px solid #ccc;
        border-radius: 4px;
        height:182px;
        width:100%;
        padding:4px;
    }

    .upload-img img {
        height: 100%;
        width: 100%;
    }

    .button-operation {
        padding:10px 0px;
    }

    .button-operation button{
        margin-left:10px;
    }

</style>