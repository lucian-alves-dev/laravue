<template>
    <div class="photo-picker">
        <img src="" alt="" />
        <label>
            <input
                type="file"
                style="display: none"
                :name="selfName"
                :accept="selfExtTypes"
                @change="onFileSelected($event)"
            />
            Alterar Foto
        </label>
    </div>
</template>

<style scoped>
    .photo-picker {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-content: center;
        text-align: center;
        font-weight: bold;
        padding: 30px;
    }

    .photo-picker img {
        width: 90px;
        height: 90px;
        border-radius: 50%;
        object-fit: cover;
        margin-bottom: 10px;
    }

    .photo-picker label {
        font-weight: normal;
        font-size: 80%;
        cursor: pointer;
    }
</style>

<script>
    export default {
        name: "PhotoPicker",
        props: ["name", "img", "extTypes", "maxSize"],
        data() {
            return {
                selfName: null,
                selfExtTypes: null,
                selfMaxSize: null,
            };
        },
        methods: {
            onFileSelected(event) {
                let file = event.target.files[0];
                if (file && file.size <= this.getMaxSizeInBytes()) {
                    this.$el.querySelector("img").src = URL.createObjectURL(file);
                } else {
                    event.target.value = null;
                    alert("A foto deve ter no máximo " + this.selfMaxSize);
                }
            },
            getMaxSizeInBytes() {
                let maxFileSize = this.selfMaxSize.toUpperCase();
                if (maxFileSize.endsWith("KB")) {
                    return maxFileSize.replace("KB", "") * Math.pow(1024, 1);
                } else if (maxFileSize.endsWith("MB")) {
                    return maxFileSize.replace("MB", "") * Math.pow(1024, 2);
                } else if (maxFileSize.endsWith("GB")) {
                    return maxFileSize.replace("GB", "") * Math.pow(1024, 3);
                } else {
                    return maxFileSize;
                }
            },
        },
        mounted() {
            this.selfName = this.name || "photo";
            this.selfExtTypes = this.extTypes || ".jpg, .jpeg, .png, .webp, .gif";
            this.selfMaxSize = this.maxSize || "50MB";
        },
        updated() {
            this.$el.querySelector("*[name='photo']").value = null;
            this.$el.querySelector("img").src = this.Api.baseUrl + (this.img || "files/user/nophoto.svg");
        }
    };
</script>