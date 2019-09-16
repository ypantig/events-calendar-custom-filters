# The Events Calendar Custom Filtering

This uses the Events Calendar Category taxonomy to filter through the calendar.

When users click on a category, this will refresh the page instead of just filtering the calendar.

## Code

```
<input type="radio" name="category" value="<?php echo $term->slug ?>" onclick="window.location.href='<?php echo get_post_type_archive_link( 'tribe_events' ); ?>?tribe_event_category=<?php echo $term->slug; ?>'" <?php echo $selected; ?>>
```

Set the value of the input to the slug
`<?php echo $term->slug ?>`

On click, set the `window.location.href` to have a `tribe_event_category` parameter with the value of the term (slug).
```
window.location.href='<?php echo get_post_type_archive_link( 'tribe_events' ); ?>?tribe_event_category=<?php echo $term->slug; ?>
```

Check if the parameter is the same value as the current term that we're looping through.
```
if ( $term->slug == $parameter ) {
  $selected = ' checked="checked"';
}
```


## Future Considerations

- Create a JavaScript function to do the filtering via ajax instead of refreshing the page
