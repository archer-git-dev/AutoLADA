const inp_file = document.querySelector('.inp_file');
const photos_wrapper = document.querySelector('.photos_wrapper');
const blog_image = document.querySelector('.blog_photo');
const blog_image_wrapper = document.querySelector('.blog_image_wrapper');



if (inp_file !== null) {
    inp_file.addEventListener('change', async() => {
        download(inp_file);
        setTimeout( () => deletePhoto(), 10 ) ;
    })
}

if (blog_image !== null) {
    blog_image.addEventListener('change', () => {
        previewBlogImage(blog_image);
    })
}

function previewBlogImage(inp_photo) {
    let photo = inp_photo.files[0];

    let reader = new FileReader();
    reader.readAsDataURL(photo);

    blog_image_wrapper.textContent = '';
    
    reader.onload = function() {

        let img = document.createElement('img');
        img.alt = 'blog_photo';
        img.src = reader.result;
        img.classList.add('blog_photo');

        blog_image_wrapper.appendChild(img);
    }

}

function download(input_file) {
    let photos = Array.from(input_file.files)

    //photos_wrapper.textContent = '';

    for (let i = 0; i < photos.length; i++) {
        let file = photos[i];
        let reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function() {

            let wrapper = document.createElement('div');
            wrapper.classList.add('wrap_photo');

            let img = document.createElement('img');
            img.alt = 'car_photo';
            img.src = reader.result;
            img.classList.add('car_photo');

            let del = document.createElement('span');
            del.classList.add('del_photo');
            del.innerHTML = 'Удалить';
            del.style.cursor = 'pointer';

            wrapper.appendChild(img);
            wrapper.appendChild(del);

            photos_wrapper.appendChild(wrapper);

        }
        
        
    }

}


function deletePhoto() {

    let del_photos = document.querySelectorAll('.del_photo');
    let wrap_photo = document.querySelectorAll('.wrap_photo');

    // console.log(del_photos);
    // console.log(wrap_photo);
    
    del_photos.forEach( (del_photo, index) => {
        del_photo.addEventListener('click', () => {
            photos_wrapper.removeChild(wrap_photo[index]);
        })
    } )

}

function digits_int(target){
	val = $(target).val().replace(/[^0-9]/g, '');
	val = val.replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
	$(target).val(val);
}

function format_number(id) {
    $(function($){
        $('body').on('input', id, function(e){
            digits_int(this);
        });
        digits_int(id);
    });
}

if (document.getElementById('price') !== null)  format_number('#price');
if (document.getElementById('mileage') !== null)  format_number('#mileage'); 





// for edit car

const inp_file_edit = document.querySelectorAll('.inp_file_edit');
// const upload_wraps = document.querySelectorAll('.upload_wrap');
// const photos_wrapper_edit = document.querySelector('.photos_wrapper.edit');

if (inp_file_edit !== null) {
    inp_file_edit.forEach( (inp_edit, inp_edit_index) => {
        inp_edit.addEventListener('change', async() => {
            downloadEdit(inp_edit, inp_edit_index);
        })
    } )
}

function downloadEdit(input_file, inp_edit_index) {

        const images = document.querySelectorAll('.car_photo');

        let file = input_file.files[0];
        let reader = new FileReader();
        reader.readAsDataURL(file);

        reader.onload = function() {
            images[inp_edit_index].src = reader.result;
        }
        
}

























