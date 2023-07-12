create table users(
   id int not null AUTO_INCREMENT,
   name varchar(255),
   email varchar(255),
   password varchar(255),
   role_as int,
   is_premium int,
   created_by_id int,
   updated_by_id int,
   created_at timestamp,
   updated_at timestamp,
   
   primary key(id)
);

create table artist(
   id int not null AUTO_INCREMENT,
   name  varchar(255),
   created_by_id int,
   updated_by_id int,
   created_at timestamp,
   updated_at timestamp,
   primary key(id)
);


create table albums(
   id int not null AUTO_INCREMENT,
   artist_id int,
   name  varchar(255),
   created_by_id int,
   updated_by_id int,
   created_at timestamp,
   updated_at timestamp,
   
   primary key(id),
    
   FOREIGN key (artist_id) REFERENCES artist(id)
);

create table songs(
   id int not null AUTO_INCREMENT,
   artist_id int,
   album_id int,
   name  varchar(255),
   file_name varchar(255),
   created_by_id int,
   updated_by_id int,
   created_at timestamp,
   updated_at timestamp,
   
   primary key(id),
    
   FOREIGN key (artist_id) REFERENCES artist(id),
   FOREIGN key (album_id) REFERENCES albums(id)
   
);

create table images(
   id int not null AUTO_INCREMENT,
   image_path varchar(255),
   model_id int,
   model_name varchar(255),
   created_by_id int,
   updated_by_id int,
   created_at timestamp,
   updated_at timestamp,
   primary key(id)
);


create table user_premium_request(
   id int not null AUTO_INCREMENT,
   user_id int,
   request varchar(255),
   is_verified int,
   created_by_id int,
   updated_by_id int,
   created_at timestamp,
   updated_at timestamp,
   FOREIGN key(user_id) REFERENCES users(id),
   primary key(id)
);

SELECT artist.name, images.image_path
FROM artist
INNER JOIN images ON artist.id=images.model_id;


SELECT users.name,user_premium_request.request
FROM user_premium_request
INNER JOIN users ON user_premium_request.user_id=users.id;

SELECT images.image_path,albums.name,artist.name,songs.name,songs.file_name
FROM songs
INNER JOIN artist ON songs.artist_id = artist.id JOIN albums ON songs.album_id = 
albums.id JOIN images ON songs.id = images.model_id;



SELECT songs.id,artist.artist_name,albums.albums_name,songs.name,images.image_path,songs.file_name 
from songs join artist on songs.artist_id = artist.id join albums on songs.album_id = albums.id
 join images on songs.id = images.model_id and images.model_name = 'song';


CREATE table shared(
    id int NOT null AUTO_INCREMENT,
    song_id int,
    user_id int,
    
    created_by_id int,
    updated_by_id int,
    
    created_at timestamp,
    updated_at timestamp,
    
    primary key (id),
    
    FOREIGN key (song_id) REFERENCES  songs(id),
    FOREIGN key (user_id) REFERENCES users(id)
);

CREATE table playlist(
    id int NOT null AUTO_INCREMENT,
    playlist_name varchar(255),
    user_id int,
    
    created_by_id int,
    updated_by_id int,
    
    created_at timestamp,
    updated_at timestamp,
    
    primary key (id),
    
    FOREIGN key (user_id) REFERENCES users(id)
);

CREATE table playlist_songs(
    id int NOT null AUTO_INCREMENT,
    playlist_id int,
    song_id int,
    
    created_by_id int,
    updated_by_id int,
    
    created_at timestamp,
    updated_at timestamp,
    
    primary key (id),
    
    FOREIGN key (song_id) REFERENCES songs(id),
    FOREIGN key (playlist_id) REFERENCES playlist(id)
);


CREATE TABLE followers (
    id int not null AUTO_INCREMENT,
    user_id INT,
    follower_id INT,
    
    created_at timestamp,
    updated_at timestamp,
    primary key (id),
    FOREIGN key (user_id) REFERENCES users(id),
    FOREIGN key (follower_id) REFERENCES artist(id)
);

SELECT artist.id,artist.artist_name from followers join 
artist on artist.id = followers.follower_id join users on users.id = followers.user_id 
where users.id = 1

select artist.artist_name from followers
join artist on artist.id = followers.follower_id join
users on users.id = followers.user_id where users.id = 2

SELECT * from followers join users on 
users.id = followers.user_id where users.id = 2

SELECT users.name,songs.file_name,images.image_path,artist.artist_name,
albums.albums_name,songs.name,playlist.playlist_name,playlist_songs.created_at
from playlist join playlist_songs on playlist.id = playlist_songs.playlist_id join 
songs on songs.id = playlist_songs.song_id join artist on artist.id = songs.artist_id join
albums on albums.id = songs.album_id join images on songs.id = 
images.model_id and images.model_name = 'song' join users on users.id =1;

select images.image_path,albums.albums_name,artist.artist_name,users.name as
user_name,songs.name,songs.file_name,shared.created_at from shared join songs on 
songs.id = shared.song_id join users on shared.user_id = users.id join artist on songs.artist_id =
artist.id join albums on songs.album_id = albums.id join images on songs.id = images.model_id and 
images.model_name = 'song';
