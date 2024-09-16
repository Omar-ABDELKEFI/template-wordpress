<?php
/**
 * Template Name: Song Similarity Form
 */
get_header();
?>


<div class="song-form-container">
    <h1 class="h1-class">Song Similarity Finder</h1>
    <p class="description">
    Discover how your  song compares to the top hits of any artist. Simply enter the details below, and we'll analyze the similarities in melody, beat, rhythm, instrumentation and overall sonic quality, giving you a similarity score of 0 to 100, with 100 meaning the highest level of similarity.
    </p>
    <form class="song-form">
        <div class="form-row">
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" id="firstName" name="firstName" required />
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" id="lastName" name="lastName" required />
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required />
        </div>

        <!-- Dropdown for song submission type -->
        <div class="form-group">
            <label for="songSubmissionType">Your Song</label>
            <select id="songSubmissionType" name="songSubmissionType" required>
                <option value="" disabled selected>Select how you want to submit your song</option>
                <option value="url">Paste Your Song's URL</option>
                <option value="upload">Upload Your Song</option>
            </select>
        </div>

        <!-- URL input field (hidden initially) -->
        <div class="form-group" id="songUrlContainer" style="display: none;">
            <label for="songUrl">Your Song URL</label>
            <input type="url" id="songUrl" name="songUrl" />
        </div>

        <!-- File upload input field (hidden initially) -->
        <div class="form-group" id="songFileContainer" style="display: none;">
            <label for="songFile">Upload Your MP3 File</label>
            <input type="file" id="songFile" name="songFile" accept=".mp3" />
        </div>

        <div class="form-group">
    <label for="songName">Your Song Name</label>
    <input type="text" id="songName" name="songName" required />
</div>

        <div class="form-group">
            <label for="singer">Artist to Compare</label>
            <input type="text" id="singer" name="singer" required />
        </div>
        <button type="submit" class="submit-btn">Analyze Similarity</button>
    </form>
    <div class="form-group">
        <button type="button" class="download-btn" style="display: none;">Download Results</button>
    </div>
    <div class="spinner" style="display: none;">
        <div class="spinner-border"></div>
        <p>Generating Song Similarity Score...</p>
    </div>
</div>



<?php get_footer(); ?>