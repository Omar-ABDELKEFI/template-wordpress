jQuery(document).ready(function($) {
    $('.song-form').on('submit', function(e) {
        e.preventDefault();  // Prevent default form submission

        const form = $(this);
        const formData = form.serializeArray();  // Get form data as an array

        // Create a JSON object from the form data
        const dataToSend = {
            singer_name: formData.find(item => item.name === 'singer').value,
            professor_song_url: formData.find(item => item.name === 'songUrl').value,
            professor_song_lyrics: formData.find(item => item.name === 'lyrics').value,
        };

        // Show spinner and remove previous results
        $('.results').remove();
        $('.spinner').show();

        // Make the AJAX request to the external API
        $.ajax({
            url: 'https://5000-omarabdelke-songsimilar-cvc2qmcoho8.ws-eu116.gitpod.io/compare-professor-song',
            type: 'POST',
            contentType: 'application/json',
            dataType: 'json',
            data: JSON.stringify(dataToSend),  // Send data as a JSON string
            success: function(response) {
                $('.spinner').hide();  // Hide the spinner when response is received
                if (response && Array.isArray(response)) {
                    let resultsHtml = '<div class="results"><h2>Comparison Results:</h2><table><thead><tr><th>Artist Song</th><th>Professor Song</th><th>Similarity</th></tr></thead><tbody>';
                    response.forEach(result => {
                        resultsHtml += `<tr><td>${result.artist_song}</td><td>${result.professor_song}</td><td>${result.similarity.toFixed(2)}</td></tr>`;
                    });
                    resultsHtml += '</tbody></table></div>';
                    form.after(resultsHtml);  // Display the results
                } else {
                    alert('Unexpected response from the server.');
                }
            },
            error: function(xhr, status, error) {
                $('.spinner').hide();
                alert('An error occurred: ' + error);
            }
        });
    });
});
