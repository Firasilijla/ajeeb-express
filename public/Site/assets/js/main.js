document.addEventListener('DOMContentLoaded', function () {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarContent = document.querySelector('#navbarContent');

    // Toggle Navbar Icon and Content
    navbarToggler.addEventListener('click', function () {
        const isNavbarOpen = navbarContent.classList.contains('show');

        if (isNavbarOpen) {
            // إذا كانت القائمة مفتوحة، قم بتغيير الأيقونة إلى البار
            navbarToggler.innerHTML = '<span class="navbar-toggler-icon"></span>';
        } else {
            // إذا كانت مغلقة، قم بتغيير الأيقونة إلى الإكس
            navbarToggler.innerHTML = '<i class="fas fa-times"></i>';
        }
    });

    // تأكد من إعادة تعيين الأيقونة عند إغلاق القائمة يدويًا (مثل النقر خارج القائمة)
    navbarContent.addEventListener('hidden.bs.collapse', function () {
        navbarToggler.innerHTML = '<span class="navbar-toggler-icon"></span>';
    });

    navbarContent.addEventListener('shown.bs.collapse', function () {
        navbarToggler.innerHTML = '<i class="fas fa-times"></i>';
    });

        // Close the navbar when clicking outside (optional)
        document.addEventListener('click', function (e) {
            if (!navbarContent.contains(e.target) && !navbarToggler.contains(e.target)) {
                if (navbarContent.classList.contains('show')) {
                    navbarContent.classList.remove('show');
                    navbarToggler.innerHTML = '<span class="navbar-toggler-icon"></span>';
                }
            }
        });





    // Toggle Services Arrow
    const servicesLink = document.querySelector('.nav-item.dropdown .nav-link');
    servicesLink.addEventListener('click', function () {

        if (servicesArrow.classList.contains('fa-chevron-up')) {
            servicesArrow.classList.remove('fa-chevron-up');
            servicesArrow.classList.add('fa-chevron-down');
        } else {
            servicesArrow.classList.remove('fa-chevron-down');
            servicesArrow.classList.add('fa-chevron-up');
        }
    });

  
    function updateMobileIcons() {
        // التحقق مما إذا كان العرض الحالي هو الجوال
        if (window.innerWidth <= 991) {
            document.querySelectorAll(".navbar-nav .nav-item .nav-link").forEach(function (link) {
                // استثناء الرابط الذي يحتوي على الفئة "service"
                if (!link.classList.contains("service") && !link.querySelector(".mobile-arrow")) {
                    let arrowIcon = document.createElement("i");
                    arrowIcon.classList.add("fas", "fa-arrow-right", "mobile-arrow"); // أيقونة السهم
                    arrowIcon.style.marginLeft = "10px"; // إضافة مسافة صغيرة بين النص والسهم
                    link.appendChild(arrowIcon); // إضافة الأيقونة داخل الرابط
                }
            });
        } else {
            // إذا كان العرض أكبر من 991px، احذف الأيقونات إن وجدت
            document.querySelectorAll(".mobile-arrow").forEach(icon => icon.remove());
        }
    }
    
    // تنفيذ الدالة عند تحميل الصفحة
    updateMobileIcons();
    
    // إعادة التحقق عند تغيير حجم الشاشة
    window.addEventListener("resize", updateMobileIcons);
    
});

// ---------------whatsapp-modal
// إظهار المودل عند الضغط على الأيقونة
function showModal() {
    document.getElementById("whatsapp-modal").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  
  // إغلاق المودل عند الضغط على زر الإغلاق
  function closeModal() {
    document.getElementById("whatsapp-modal").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
  }
  
  // إغلاق المودل عند الضغط على الطبقة الخلفية
  document.getElementById("overlay").addEventListener("click", closeModal);
  
// -------------------------------------------showVolumetricModal
  function showVolumetricModal() {
    document.getElementById("Volumetric-weight-modal").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  function closeVolumetricModal() {
    document.getElementById("Volumetric-weight-modal").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
  }
  
  
// -------------------------------------------showCMBModal
function showCMBModal() {
    document.getElementById("CMB-modal").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  function closeCMBModal() {
    document.getElementById("CMB-modal").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
  }

  // -------------------------------------------showTrackShipmentModel
function showTrackShipmentModal() {
    document.getElementById("TrackShipment-modal").classList.add("active");
    document.getElementById("overlay").classList.add("active");
  }
  function closeTrackShipmentModal() {
    document.getElementById("TrackShipment-modal").classList.remove("active");
    document.getElementById("overlay").classList.remove("active");
  }
//   ------------------faq 
// JavaScript to toggle the FAQ answer visibility
document.querySelectorAll('.faq-box').forEach(function(box) {
    box.addEventListener('click', function() {
      // Close all other open answers and reset arrows
      document.querySelectorAll('.faq-answer').forEach(function(answer) {
        answer.style.display = 'none';
      });
      document.querySelectorAll('.faq-arrow').forEach(function(arrow) {
        arrow.classList.remove('active');
      });

      // Toggle the clicked box's answer visibility and arrow style
      const arrow = box.querySelector('.faq-arrow');
      const answer = box.querySelector('.faq-answer');

      // If the answer is currently hidden, show it and update the arrow
      if (answer.style.display === 'none' || answer.style.display === '') {
        answer.style.display = 'block';
        arrow.classList.add('active');
      } else {
        answer.style.display = 'none';
        arrow.classList.remove('active');
      }
    });
  });






// document.addEventListener("DOMContentLoaded", function () {
//     const dropdown = document.querySelector(".nav-item.dropdown");
//     const dropdownToggle = document.querySelector(".nav-link.service");
//
//     if (dropdown && dropdownToggle) {
//         dropdownToggle.addEventListener("click", function (event) {
//             event.preventDefault();
//             dropdown.classList.toggle("show");
//
//         });
//
//         // إغلاق القائمة عند النقر خارجها
//         document.addEventListener("click", function (event) {
//             if (!dropdown.contains(event.target) && !dropdownToggle.contains(event.target)) {
//                 dropdown.classList.remove("show");
//             }
//         });
//     }
// });




function toggleSection(sectionId) {
    var section = document.getElementById(sectionId);
    var faqBox = section.closest('.faq-box');

    // Toggle display of text
    section.style.display = section.style.display === 'block' ? 'none' : 'block';

    // Change arrow direction and background color, expand box
    faqBox.classList.toggle('active');
}




document.addEventListener("DOMContentLoaded", function () {
    const dropdownToggle = document.getElementById("navbarDropdown");
    const dropdownMenu = document.getElementById("service-dropdown-menu");
    const parentLi = dropdownToggle.closest("li");

    function isMobile() {
        return window.innerWidth <= 991;
    }

    dropdownToggle.addEventListener("click", function (e) {
        if (isMobile()) {
            e.preventDefault();
            parentLi.classList.toggle("show-dropdown"); // إضافة أو إزالة الكلاس المسؤول عن إظهار القائمة
        }
    });

    // إغلاق القائمة عند النقر خارجها
    document.addEventListener("click", function (event) {
        if (isMobile() && !parentLi.contains(event.target) && event.target !== dropdownToggle) {
            parentLi.classList.remove("show-dropdown");
        }
    });
});
