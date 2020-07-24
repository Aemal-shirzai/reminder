<!DOCTYPE html> 
<html>
    <head></head>
    <body>
        <h3>Your Event Latest News</h3>
        <p style="word-break: break-all;"> Your <b>{{ $title }} </b> event is about to start in {{ $countDays }} days.</p>
        <hr>
        <h3>Event Content</h3>
        <p>Title: {{ $title }}</p>
        <p>Content: {{ $content }}</p>
        <p>For: {{ $religion }}</p>
        <p>Date: {{ $eventDate }}</p>
    </body>
</html>