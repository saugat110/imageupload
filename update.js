function updateform(name, id){
    // console.log('hello');
    document.getElementById('update_form').style.display = 'block';
    document.getElementById('change_name').value= name;
    document.getElementById('t2').value = id;
}

function cancel(){
    document.getElementById('update_form').style.display = 'none';
}