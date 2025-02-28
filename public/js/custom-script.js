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
  
  
    $(document).on("click", ".add_sub_btn", function () {
        let element = $(this);
        let element_type = element.data("field_type");
    
        if (element_type === "features") {
            if (element.hasClass("add_field")) {
                let featuresContainer = element.closest(".setting_fields").find(".features_container").first();
                let featuresCount = featuresContainer.find('input[name="features[title][]"]').length;
    
                let html = `
                <div class="flex items-center gap-4 mt-2">
                    <input type="text" name="features[title][]" id="features_title_${featuresCount}"
                        class="rounded-md bg-white block w-full py-1.5 px-3 text-base text-gray-900 outline-1 w-full -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-green-600"
                        value="">
                    <div class="col-1">
                        <a href="javascript:void(0)" class="add_sub_btn add_field" data-field_type="features">
                             <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#3fa872"></path>
                                <svg x="11" y="11" width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.7809 18.4199H7.86689V10.6354H0.332115V8.01279H7.86689V0.35313H10.7809V8.01279H18.3157V10.6354H10.7809V18.4199Z" fill="white"></path>
                                </svg>
                            </svg>
                        </a>
                        <a href="javascript:void(0)" class="add_sub_btn sub_field" data-field_type="features">
                            <svg width="25" height="25" viewBox="0 0 41 41" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20.5 0C31.775 0 41 9.225 41 20.5C41 31.775 31.775 41 20.5 41C9.225 41 0 31.775 0 20.5C0 9.225 9.225 0 20.5 0Z" fill="#3fa872"></path>
                                <svg x="13.5" y="19" width="14" height="4" viewBox="0 0 14 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M0.957458 3.29962V0.552137H13.6126V3.29962H0.957458Z" fill="white"></path>
                                </svg>
                            </svg>
                        </a>
                    </div>
                </div>`;
    
                featuresContainer.append(html);
            } else if (element.hasClass("sub_field")) {
                element.closest(".flex").remove();
            }
        }
    });

    $(".toggle-user-approval").click(function () {
        let button = $(this);
        let userId = button.data("id");
    
        $.ajax({
            url: "/user/" + userId + "/toggle-approval",
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr('content') // Send CSRF token
            },
            success: function (response) {
                if (response.success) {
                    if (response.user_approved) {
                        button.removeClass("bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300")
                              .addClass("bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300")
                              .text("Approved");
                    } else {
                        button.removeClass("bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300")
                              .addClass("bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-300")
                              .text("Disapproved");
                    }
                }
            },
            error: function () {
                alert("Something went wrong!");
            }
        });
    });
    
    

    // Multi Image Select
    $(".image").on("change", function(event) {
        let preview = $(".preview");
        preview.html(""); // Clear previous previews
        let files = event.target.files;

        if (files.length > 0) {
            $.each(files, function(index, file) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    let img = $("<img>").attr("src", e.target.result)
                        .addClass("h-20 w-20 object-cover rounded-md border");
                    preview.append(img);
                };
                reader.readAsDataURL(file);
            });
        }
    });

    // Remove Images
    let removedImages = [];

    $(".remove-image").click(function () {
        let imageName = $(this).data("image");
        removedImages.push(imageName);

        $(".removed_images").val(JSON.stringify(removedImages));

        $(this).closest(".image-container").remove();
    });
  
});