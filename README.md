# ITRACKB4 LA11 - Movies

Prepared by: Fritz C. Springael

## Q1:
Route model binding needs two things to be true. Name both, and say what happens when only one of them is.?

[Answer - The parameter must be type-hinted with the model, as in `show(Movie $movie)`, and its name must match the route segment `{movie}`, so it is written `$movie`. If the type-hint is right but the name is wrong, Laravel has no segment to fill it from, so I don't get the movie from the URL and no error tells me why. If the name matches but there is no `Movie` type-hint, `$movie` is only the plain id from the URL, not a record.]


## Q2:
Your Delete link opened the detail page instead of deleting anything. Explain why.?

[Answer - My link, `<a href="{{ route('movies.destroy', $movie) }}">`, can only send GET to `/movies/5`. The destroy route only answers DELETE at that address, while `movies.show` answers GET there, so the browser opened the detail page for Grown Ups 2 and nothing was deleted. There was no error. The fix was a form with `@method('DELETE')`.]

## Q3:
old() takes a second argument on your edit form. What would break if you left it out, and what would break if you used only it?

[Answer - If I left it out, as in `old('title')`, the edit form would open with empty fields, exactly like my screenshot 3, because there is no fallback to the movie's own values. If I used only the second argument, as in `$movie->title`, a rejected edit would throw away what I typed, like "TEST" in Rating, and show the original 9.1 again.]