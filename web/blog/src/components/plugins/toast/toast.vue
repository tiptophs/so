<template>
    <div class="dialog">
        <div class="mask"></div>
        <div class="dialog-content">
            <div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin-bottom:0px;">
                <h4 class="title">{{ modal.title }}</h4>
                <p class="text">{{ modal.text }}</p>
                <p class="groups">
                    <button v-show="modal.cancelDisplay" type="button" class="btn btn-danger" @click="cancel">{{ modal.cancelButtonText }}</button>
                    <button v-show="modal.confirmDisplay" type="button" class="btn btn-default" @click="submit">{{ modal.confirmButtonText }}</button>
                </p>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: '',
        props: {
            dialogOption: Object
        },
        data() {
            return {
                resolve: '',
                reject: '',
                promise: '', // 保存promise对象
                modal:{
                    title:'温馨提示',
                    text:'咦！我怎么突然出现啦？╮(╯▽╰)╭',
                    cancelButtonText:'取消',
                    confirmButtonText:'确定',
                    cancelDisplay:true,
                    confirmDisplay:false
                }
            }
        },
        computed: {
        },
        methods: {
            //确定,将promise断定为完成态
            submit() {
                this.resolve('submit');
            },
            // 取消,将promise断定为reject状态
            cancel() {
                this.reject('cancel');
            },
            //显示confirm弹出,并创建promise对象，给父组件调用
            confirm() {
                let options = this.dialogOption;
                if( typeof options.title != 'undefined' ) this.modal.title = options.title;
                if( typeof options.text != 'undefined') this.modal.text = options.text;
                if( typeof options.cancelButtonText != 'undefined') this.modal.cancelButtonText = options.cancelButtonText;
                if( typeof options.confirmButtonText != 'undefined') this.modal.confirmButtonText = options.confirmButtonText;
                if( typeof options.cancelDisplay != 'undefined') this.modal.cancelDisplay = options.cancelDisplay;
                if( typeof options.confirmDisplay != 'undefined') this.modal.confirmDisplay = options.confirmDisplay;
                this.promise = new Promise((resolve, reject) => {
                    this.resolve = resolve;
                    this.reject = reject;
                });
                return this.promise; //返回promise对象,给父级组件调用
            }
        }

    }
</script>

<style scoped>
    .dialog {
        position: relative;
    }

    .dialog-content {
        position: fixed;
        left: 50%;
        top: 50%;
        width: 30%;
        padding: 20px;
        box-sizing: border-box;
        min-height: 160px;
        border-radius: 5px;
        background: #fff;
        z-index: 50002;
        transform: translate(-50%, -50%); /*各自隐藏一般*/
    }

    .dialog-content .title {
        font-size: 22px;
        font-weight: 600;
        line-height: 30px;
        margin-bottom:15px;
    }

    .dialog-content .text {
        font-size: 18px;
        line-height: 30px;
        color: #555;
        margin-bottom:15px;
    }

    .btn {
        padding: 10px 20px;
        font-size: 14px;
    }

    .groups {
        text-align: right;
    }

    .mask {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        z-index: 50001;
        background: rgba(0,0,0,.5);
    }
</style>