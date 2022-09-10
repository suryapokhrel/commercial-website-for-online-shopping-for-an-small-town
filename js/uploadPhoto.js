// declearing html elements

const photo = document.querySelector('#photo');
const file = document.querySelector('#file');


file.addEventListener('change', function(){
    const choosedFile = this.files[0];

    if(choosedFile){
        const reader = new FileReader();

        reader.addEventListener('load', function(){
            photo.setAttribute('src', reader.result);
        });
        reader.readAsDataURL(choosedFile);
    }
});  