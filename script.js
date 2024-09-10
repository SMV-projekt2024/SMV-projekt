/*------------NAVIGATION BAR----------*/
function showSidebar(){
    const sidebar = document.querySelector('.sidebar')
    /*sidebar.style.display = "flex"*/
    sidebar.classList.toggle('open')
}
function hidSidebar(){
    const sidebar = document.querySelector('.sidebar')
    sidebar.classList.toggle('close')
    sidebar.classList.remove('open');
    /*sidebar.style.display = "none"*/

}

/*---------SIGN IN/SIGN UP POPUP---------------*/
const signinZunanji = document.querySelector(".zunanjiLogin")
const signUPZunanji = document.querySelector(".signup")
function showSignIn(){
    signinZunanji.style.display = "flex"
    signUPZunanji.style.display = "none"
}
function closeSignIn(){
    signinZunanji.style.display = "none"
}
function showSignUp(){
    signUPZunanji.style.display = "flex"
    signinZunanji.style.display = "none"
}
function closeSignUp(){
    signUPZunanji.style.display = "none"
}


/*----------MessageBox------------ */
function closeMessagePopup(){
    const msgBox = document.querySelector(".MessagePopup")
    msgBox.style.display = "none"
}


if ('scrollRestoration' in history) {
    history.scrollRestoration = 'auto';
}

/* --------------CHANGE DELETE ICON -------------- */
function change(img){
    img.src="img/delete-Outside-Hover.png";
    }

function changeback(img){
    img.src= "img/delete-removebg-Outside.png";
}


/*------------------POPUP ON DELETING----------------- */

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll('.deleteButton').forEach(link => {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            var confirmed = confirm("Are you sure you want to delete item?");
            var url = link.getAttribute('href');
            if (confirmed) {
                window.location.href = url;
            }
            else{
                window.location.href = 'posts_stran.php';
            }
        });
    });
});


/*----------load ANIMATION (interception)-------------*/

const observer = new IntersectionObserver((items) => {
    items.forEach((item) => {
        console.log(item)
        if (item.isIntersecting) {
            item.target.classList.add("show")
        }else{
            item.target.classList.remove("show")
        }
    })
})
const hiddenItems = document.querySelectorAll(".hidden");
hiddenItems.forEach((item) => observer.observe(item))

/*------------------CURSOR TRAIL---------------*/
const trailer = document.querySelector(".trailer")

window.onmousemove = cursor => {
    
    const x = cursor.clientX - trailer.offsetWidth / 2,
          y = cursor.clientY - 45 - trailer.offsetHeight / 2;

    const keyframes = {
        transform: `translate(${x}px, ${y}px )`
    }
    
    trailer.animate(keyframes, {
        duration: 1000,
        fill: "forwards"
    })
}





