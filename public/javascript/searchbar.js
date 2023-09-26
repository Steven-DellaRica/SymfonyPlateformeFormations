const toggle = document.querySelector('.form .icon');
const fromWrapper = document.querySelector('.form');

console.log(toggle);

toggle.addEventListener('click', function() {
    const icon = this.querySelector('.fas');
    const icon2 = this.querySelector('.fas2');
    this.classList.toggle=('active');
    fromWrapper.classList.toggle('active');

    console.log(this.classList);

    if(this.classList.contains('active')){
        console.log('Croix');
        icon.classList.replace("fas", "fas2");
        icon2.classList.replace("fas2", "fas");
    } else {
        console.log('Loupe');
        icon.classList.replace("fas", "fas2");
        icon2.classList.replace("fas2", "fas");
    }
})