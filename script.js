// عند الضغط على زر "Afficher les étudiants"
document.addEventListener("DOMContentLoaded", function () {
    const afficherBtn = document.getElementById("afficherBtn");
    const tableauContainer = document.getElementById("tableauContainer");

    if (afficherBtn) {
        afficherBtn.addEventListener("click", function (e) {
            e.preventDefault(); // يمنع الفورم من الإرسال

            // إرسال طلب لجلب الجدول من afficher.php بدلاً من enregistrer.php
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "afficher.php", true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    tableauContainer.innerHTML = xhr.responseText;
                    tableauContainer.style.display = "block";
                } else {
                    alert("Une erreur est survenue lors du chargement du tableau.");
                }
            };
            xhr.send();
        });
    }
});