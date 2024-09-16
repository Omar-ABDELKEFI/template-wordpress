<?php
/**
 * Template Name: Song Similarity Form
 */
get_header(); ?>

<div class="song-form-container">
    <h1>Song Similarity Finder</h1>
    <p class="description">
        Enter the details of a song and find out how similar it is to the top 5 songs of a provided singer. We'll analyze the song and provide you with a similarity score.
    </p>
    <form class="song-form">
        <div class="form-group">
            <label>First Name</label>
            <input type="text" name="firstName" required />
        </div>
        <div class="form-group">
            <label>Last Name</label>
            <input type="text" name="lastName" required />
        </div>
        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" required />
        </div>
        <div class="form-group">
            <label>Song URL</label>
            <input type="url" name="songUrl" required />
        </div>
        <div class="form-group">
            <label>Lyrics</label>
            <textarea name="lyrics" required></textarea>
        </div>
        <div class="form-group">
            <label>Singer</label>
            <input type="text" name="singer" required />
        </div>
        <button type="submit" class="submit-btn">Find Similar Songs</button>
        <div class="spinner" style="display: none;">
            <div class="spinner-border"></div>
            <p>Calculating magic...</p>
        </div>
    </form>
</div>

<?php get_footer(); ?>
