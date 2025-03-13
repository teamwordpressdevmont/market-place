$(document).ready(function() {

    var swiper = new Swiper(".thumbmySwiper", {
        spaceBetween: 10,
        slidesPerView: 6,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });


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

    // Event delegation for dynamically added dropdown buttons
    // $(document).on("click", "[data-dropdown-toggle]", function (e) {
    //     e.preventDefault();
    //     let dropdownId = $(this).attr("data-dropdown-toggle");
    //     let dropdown = $("#" + dropdownId);

    //     // Toggle dropdown visibility
    //     $(".dropdown-menu").not(dropdown).hide(); // Close other dropdowns
    //     dropdown.toggle();
    // });

    // Hide dropdown when clicking outside
    // $(document).on("click", function (e) {
    //     if (!$(e.target).closest("[data-dropdown-toggle], .dropdown-menu").length) {
    //         $(".dropdown-menu").hide();
    //     }
    // })

     // Toggle dropdown
    $('#dropdownDefaultButton').click(function() {
        $('#dropdown').toggleClass('hidden');
    });

    // Hide dropdown on clicking outside
    $(document).click(function(e) {
        if (!$(e.target).closest('#dropdown, #dropdownDefaultButton').length) {
            $('#dropdown').addClass('hidden');
        }
    });

    // Status filter click event
    $(document).on('click', '.order-status-filter', function(e) {
        e.preventDefault();

        let statusId = $(this).data('status'); // Get selected status ID
        let url = $('#searchForm').attr('action'); // Get base URL from form action

        // Change button text
        $('#dropdownDefaultButton').text($(this).text());

        loadTable(url + '?status=' + statusId); // Send AJAX request

        $('#dropdown').addClass('hidden'); // Close dropdown after selection
    });

    function loadTable(url) {
        $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            beforeSend: function() {
                $('#table-container table tbody').html(`
                    <tr>
                        <td colspan="100%" class="text-center py-4">
                            <div role="status">
                                <svg aria-hidden="true" class="inline w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                    <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                </svg>
                                <span class="sr-only">Loading...</span>
                            </div>
                        </td>
                    </tr>
                `);
            },
            success: function(response) {
                $('#table-container').html($(response.html).find('#table-container').html());
                $('#pagination-container').html($(response.html).find('#pagination-container').html());
            },
            error: function(xhr, status, error) {
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
                        class="rounded-2xl bg-white border border-gray-300 text-gray-900 focus:ring-gray-500 focus:border-gray-500 block flex-1 min-w-0 w-full text-sm p-3"
                        value="">
                    <div class="col-1">
                        <a href="javascript:void(0)" class="add_sub_btn add_field bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features">
                             <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11 7V15M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
                            </svg>
                            </svg>
                        </a>
                        <a href="javascript:void(0)" class="add_sub_btn sub_field bg-[#EDE9D0] border border-[#c5c1ad] px-4 py-2.5 rounded-2xl flex! items-center justify-center" data-field_type="features">
                            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M15 11L7 11" stroke="#222222" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                <path d="M21 11C21 5.47715 16.5228 1 11 1C5.47715 1 1 5.47715 1 11C1 16.5228 5.47715 21 11 21C16.5228 21 21 16.5228 21 11Z" stroke="#222222" stroke-width="1.5"></path>
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

    $(".toggleApprovalBtn").click(function () {
        let button = $(this);
        let testimonialId = button.data("id");

        if (button.text().trim() === "Add to Website") {
            // Open modal for order number input
            $("#testimonialId").val(testimonialId);
            $("#approvalModal").removeClass("hidden");
        } else {
            // Directly remove testimonial without modal
            $.ajax({
                url: "/testimonial/toggle-approval/" + testimonialId,
                type: "POST",
                data: {
                    _token: $('meta[name="csrf-token"]').attr("content")
                },
                success: function (response) {
                    alert(response.message);
                    button.removeClass("bg-red-700").addClass("bg-green-700").text("Add to Website");
                },
                error: function () {
                    alert("Error removing testimonial.");
                }
            });
        }
    });

    $(".toggle-user-approval").click(function () {
        let testimonialId = $("#testimonialId").val();
        let orderNumber = $("#order_number").val();

        $.ajax({
            url: "/testimonial/toggle-approval/" + testimonialId,
            type: "POST",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
                order_number: orderNumber
            },
            success: function (response) {
                alert(response.message);
                $("#approvalModal").addClass("hidden");
                let button = $('.toggleApprovalBtn[data-id="' + testimonialId + '"]');
                button.removeClass("bg-green-700").addClass("bg-red-700").text("Remove from Website");
            },
            error: function () {
                alert("Error approving testimonial.");
            }
        });
    });

    $("#closeModal").click(function () {
        $("#approvalModal").addClass("hidden");
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




    function toggleIconField() {
        const selectedValue = $('#parent_id').val();

        if (selectedValue) {
            $('#iconField').show(); // Show icon field for child categories
        } else {
            $('#iconField').hide(); // Hide for parent categories
        }
    }

    // Initial check
    // toggleIconField();

    // On dropdown change
    $(document).on('change', '#parent_id', function () {
        toggleIconField();
    });


    // $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });
    
    $(document).on('click', '.tradeperson-user-approval', function () {
        let button = $(this);
        let userId = button.data('id');
    
        $.ajax({
            url: '/tradeperson/tradeperson-toggle-approval/' + userId,
            type: 'POST',
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                if (response.success) {
                    // Toggle text and styles based on approval status
                    if (response.user_approved) {
                        button.removeClass('bg-red-100 text-red-800')
                              .addClass('bg-green-100 text-green-800')
                              .text('Approved');
                    } else {
                        button.removeClass('bg-green-100 text-green-800')
                              .addClass('bg-red-100 text-red-800')
                              .text('Disapproved');
                    }
                } else {
                    alert('Failed to update status.');
                }
            },
            error: function (xhr) {
                alert('Error: ' + xhr.status + ' - ' + xhr.responseText);
            }
        });
    });
    

    

});
