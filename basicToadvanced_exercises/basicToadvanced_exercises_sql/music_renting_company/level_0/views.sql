create view view_artists as 
select artist.name as aritst , artist.birth_date as birthdate , count(title)  from artist left join  music on artist.id=art_id group by artist.name,artist.birth_date order by artist.name;

create view view_albums as 
select album.name as album, count (alb_id) as songs ,duration_to_string( cast( sum(duration) as integer)) as duration from album left join music_album  on album.id=music_album.alb_id  join music on music_album.music_id=music.id  group by album.name , music_album.music_id order by album.name;

create view views_songs 
select title as music , name as aritst , duration_to_string(duration) from artist,music where music.art_id=artist.id;

