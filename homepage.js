function search_animal() {
    let input = document.getElementById('searchbar').value
    input=input.toLowerCase();
    let x = document.getElementsByClassName('car_name');
    let images=document.querySelectorAll('.container .img')  
   
    for (i = 0; i < x.length; i++) { 
        if (!x[i].innerHTML.toLowerCase().includes(input)) {
            x[i].style.display="none";
        }
        else {
            x[i].style.display="list-item";
            // images.show()
        
        }
    }
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