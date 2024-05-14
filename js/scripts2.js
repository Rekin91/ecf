
function sendAnimalId(event, url) {
    var animalId = event.relatedTarget.getAttribute('data-animal');
    var xhr = new XMLHttpRequest();
    xhr.open('POST', "Controller/consultation.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            console.log('Variable animalId envoyée avec succès à consultation.php');
        }
    };
    xhr.send('animalId=' + encodeURIComponent(animalId));
}



var modalEl1 = document.getElementById('portfolioantilopes');
modalEl1.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl2 = document.getElementById('portfoliolions');
modalEl2.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl3 = document.getElementById('portfoliogirafes');
modalEl3.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl4 = document.getElementById('portfoliogorilles');
modalEl4.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl5 = document.getElementById('portfolioleopards');
modalEl5.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl6 = document.getElementById('portfolioserpents');
modalEl6.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl7 = document.getElementById('portfoliocrocodiles');
modalEl7.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl8 = document.getElementById('portfolioflamands');
modalEl8.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});

var modalEl9 = document.getElementById('portfolioratons');
modalEl9.addEventListener('show.bs.modal', function (event) {
    sendAnimalId(event, 'Controller/consultation.php');
});