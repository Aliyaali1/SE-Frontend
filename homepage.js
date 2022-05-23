function change() // no ';' here
{
    var elem = document.getElementById("#b1");
    if (elem.value=="Status") elem.value = "Booked";
    else elem.value = "Unbooked";
}


// let searchbox=document.querySelector('#searchbar');
// let images=document.querySelectorAll('.container .img');  
// searchbox.oninput=()=>{
//     images.forEach(hide => hide.style.display='none');
//     let value=searchbox.value;
//     images.forEach(filter => {
//      let title=filter.getAttribute('car_name');   
//     });
// }   