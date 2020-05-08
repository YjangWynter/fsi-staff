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
	var sections = $('.sectionContent');
	function updateContentVisibility(){
    var checkedLong = $(".filter-controls.long :checkbox:checked");
    if(checkedLong.length){
      sections.hide();
      checkedLong.each(function(){
          $("." + $(this).val()).show();
      });
    } else {
      sections.show();
    }
	}

	function updateContentVisibilityShort(){
    var checkedShort = $(".filter-controls.short :checkbox:checked");
    if(checkedShort.length){
      sections.hide();
      checkedShort.each(function(){
      	console.log(this);
          $("." + $(this).val()).show();
      });
    } else {
       sections.show();
    }
	}


	$(".filter-controls.short :checkbox").click(updateContentVisibilityShort);
	updateContentVisibilityShort();
	$(".filter-controls.long :checkbox").click(updateContentVisibility);
	updateContentVisibility();

	</script>

```