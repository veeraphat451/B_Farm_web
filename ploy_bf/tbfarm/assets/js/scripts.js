// Scroll Cards Left
function scrollLeft() {
    const cardsContainer = document.querySelector('.cards-container .cards');
    if (cardsContainer) {
        cardsContainer.scrollBy({
            left: -300,
            behavior: 'smooth',
        });
    }
}

// Scroll Cards Right
function scrollRight() {
    const cardsContainer = document.querySelector('.cards-container .cards');
    if (cardsContainer) {
        cardsContainer.scrollBy({
            left: 300,
            behavior: 'smooth',
        });
    }
}

// Smooth Scroll for Navbar Links
document.querySelectorAll('header nav ul li a').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault(); // ปิดพฤติกรรมเริ่มต้นของลิงก์
        const targetId = this.getAttribute('href'); // ดึงค่า href ของลิงก์
        const targetSection = document.querySelector(targetId); // หา element ของ section
        if (targetSection) {
            targetSection.scrollIntoView({
                behavior: 'smooth', // กำหนดการเลื่อนแบบ smooth
                block: 'start', // เลื่อนให้ส่วนอยู่บนสุด
            });
        }
    });
});

// Navbar Visibility on Scroll


document.addEventListener("DOMContentLoaded", function () {
    let lastScrollTop = 0; // เก็บตำแหน่งการเลื่อนก่อนหน้า
    const navbar = document.querySelector("header"); // เลือก Header

    window.addEventListener("scroll", function () {
        const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

        if (currentScroll > lastScrollTop) {
            // เมื่อเลื่อนลง
            navbar.classList.remove("navbar-visible");
            navbar.classList.add("navbar-hidden");
        } else {
            // เมื่อเลื่อนขึ้น
            navbar.classList.remove("navbar-hidden");
            navbar.classList.add("navbar-visible");
        }

        lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; // ป้องกันค่าติดลบ
    });
});
