TODO: 

1. Set classnames for each of the entries based on their general title & area of interests
2. On initial paint print the rows with entries with these new classnames
3. Create a control menu panel at the top of the page with checkboxes for each of the tags and titles to filter 
    - Run the program every time the user selects/deselects a filter immediately
5. When the user selects an option, run `filter()` with a function that with parse the classname's of all available entries on the screen, which will create a new array with all valid entries or collect none.
6. Reprint the entrie section of rows with the new entries until all the entries are printed on the screen. 
    - if there are no tags or anything to filter, leave screen as is until next user input
    - if the user removes a tag, redo the array with the available tags left in the filter check box


## Ripping code
```javascript

/* 
script in jQuery from 
https://planets.ucf.edu/current-members/
 */
	<script>

	var entries = $('.entry');//array of all elements of class: aka staff entries that include this class
	function updateContentVisibilityAreas(){ //function updates vis for the areass of staff
    var checkedAreas = $(".filter-controls.areas :checkbox:checked"); // array of all the classes checked from control panel
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
    var checkedTitle = $(".filter-controls.title :checkbox:checked");
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


	$(".filter-controls.title :checkbox").click(updateContentVisibilityTitle);
	updateContentVisibilityTitle();
	$(".filter-controls.areas :checkbox").click(updateContentVisibilityAreas);
	updateContentVisibilityAreas();

	</script>

```