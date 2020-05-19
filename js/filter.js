var entries = $('.entry');//array of all elements of class: aka staff entries that include this class
function updateContentVisibilityAreas(){ //function updates vis for the areass of staff
var checkedAreas = $(".filter-category.areas :checkbox:checked");
$(".filter-category.areas :checkbox:checked"); // array of all the classes checked from control panel
if(checkedAreas.length){
  entries.hide();// hides all the entries
  checkedAreas.each(function(){
      $("." + $(this).val()).show(); //show only the entries that share the selected class
  });
} else {
  entries.show(); // otherwise re-display all entries
}
}
function updateContentVisibilityTitle(){ //function updates display by title of staff
var checkedTitle = $(".filter-category.position :checkbox:checked");
if(checkedTitle.length){
  entries.hide();
  checkedTitle.each(function(){
      console.log(this);
      $("." + $(this).val()).show();
  });
} else {
   entries.show();
}
}


$(".filter-category.position :checkbox").click(updateContentVisibilityTitle);
updateContentVisibilityTitle();
$(".filter-category.areas :checkbox").click(updateContentVisibilityAreas);
updateContentVisibilityAreas();
