$(document).ready(function() {
   
        
    // Editor page
    $('.textarea_editor').trumbowyg({
        autogrow: true
    });
    
    $('input[type="file"]').change(function(event) {
        let input = $(this); // Get current file input
        let file = event.target.files[0]; // Get selected file
        
        if (file) {
            let reader = new FileReader();
            reader.onload = function(e) {
                // Find closest PreviewContainer related to the current file input
                let previewContainer = input.siblings('#PreviewContainer');
                
                if (previewContainer.length) {
                    previewContainer.removeClass('hidden'); // Show container if hidden
                    previewContainer.find('.Preview').attr('src', e.target.result); // Update preview image
                }
            };
            reader.readAsDataURL(file);
        }
    });

    // Close button functionality to remove image preview
    $('.CloseIcon').click(function() {
        let previewContainer = $(this).closest('#PreviewContainer');
        previewContainer.find('.Preview').attr('src', ''); // Clear image source
        previewContainer.addClass('hidden'); // Hide preview container
        previewContainer.siblings('input[type="file"]').val(''); // Reset file input
    });
  
  
    $('#searchForm').on('submit', function (e) {
        e.preventDefault();
        let url = $(this).attr('action');
        let search = $(this).find('input[name="search"]').val();

     
        if (search !== '') {
    
            $('.close-icon').show();
        }

        let fullUrl = url + '?search=' + encodeURIComponent(search);
        loadTable(fullUrl);

    });

      // Reset Search icon click hone par search remove kare
      $('.close-icon').on('click', function () {
        $('#searchForm input[name="search"]').val('');
        $(this).hide();
        loadTable($('#searchForm').attr('action'));
    });

    // Intercept clicks on pagination links
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        loadTable(url);
    });

    function loadTable(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json', // expecting JSON response with the full view HTML
            beforeSend: function () {
                // Optionally, show a loading message or spinner
                $('#table-container table tbody').html('<p>Loading...</p>');
            },
            success: function (response) {
                // Since the full view is returned, extract only the table container's HTML.
                var newContent = $(response.html).find('#table-container').html();
                $('#table-container').html(newContent);
                
                // Update pagination container dynamically
                var newPagination = $(response.html).find('#pagination-container').html();
                $('#pagination-container').html(newPagination);
            },
            error: function (xhr, status, error) {
                
                console.error('Error loading table:', error);
            }
        });
    }

    // Handle pagination click event dynamically
    $(document).on("click", "#pagination-container a", function (e) {
        e.preventDefault();
        let url = $(this).attr("href");
        if (url) {
            loadTable(url); // Fetch data using AJAX
        }
    });

    // Handle search form submit
    $("#search-form").on("submit", function (e) {
        e.preventDefault();
        let url = $(this).attr("action") + "?" + $(this).serialize();
        loadTable(url); // Fetch filtered results using AJAX
    });
  
  
  
});