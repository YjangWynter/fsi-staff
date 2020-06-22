/*
Few kinks 
The program doesn't store the variables that were selected in memory yet and operates as an OR gate currently,
which means I must turn the program into one that acts as an AND gate and store the data selected into a muttable structure 
to retain values

*/
//array of all elements of class: aka staff entries that include this class
var entries = $('.entry');

 //function updates vis for the areass of staff
function getAreas(){

  let checkedAreas = $(".filter-category.areas :checkbox:checked");

 // array of all the classes checked from control panel
  let selected = [];

  if(checkedAreas.length > 0){

    checkedAreas.each(function(){

        selected.push("." + $(this).attr('id'));

    });

  }
  console.log(selected);

  return selected;

}
  
//function updates display by title of staff
function getTitles(){ 

  let checkedTitle = $(".filter-category.position :checkbox:checked ");

  let selected = [];

  if(checkedTitle.length > 0){

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

  //turn array to string
  let query = classes.join("");

  console.log("This is the pre-formated query: "+ query);



  if (query.length > 0){

  //removes all commas from string using regex
  query = query.replace(/,/g, "");

  
  $(""+ query+ "").show();

  console.log( $(''+query+'').show());

  console.log("This is the post-formated query: "+ query);

  } else{
    entries.show();

  }
}

$(".filter-category :checkbox").click(updateContentVisbility);



