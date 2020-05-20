/*
Few kinks 
The program doesn't store the variables that were selected in memory yet and operates as an OR gate currently,
which means I must turn the program into one that acts as an AND gate and store the data selected into a muttable structure 
to retain values

*/
var entries = $('.entry');//array of all elements of class: aka staff entries that include this class



function getAreas(){ //function updates vis for the areass of staff
  let checkedAreas = $(".filter-category.areas :checkbox:checked"); // array of all the classes checked from control panel
  let selected = [];
  if(checkedAreas.length){
    checkedAreas.each(function(){
        selected.push("." + $(this).attr('id'));

    });
  } 
  console.log(selected);
  return selected;
}
function getTitles(){ //function updates display by title of staff
  let checkedTitle = $(".filter-category.position :checkbox:checked ");
  let selected = [];
  if(checkedTitle.length){
    checkedTitle.each(function(){
        selected.push("." + $(this).attr('id'));

    });

  } 
  console.log(selected);
  return selected;
}
function updateContentVisbility(){
  let classes = [];
  entries.hide();
  classes.push(getTitles(), getAreas());
  console.log(classes);
  
  let query = classes.join("");
  if (query.length){


  query = query.replace(",", "");
  
  $(""+ query+ "").show();
  console.log( $(''+ query+'').show());
  console.log(query);
  } else{
    entries.show();
  }
}


$(".filter-category :checkbox").click(updateContentVisbility);


