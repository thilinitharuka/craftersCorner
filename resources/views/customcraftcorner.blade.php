@extends('layouts.guest')


<style>


    .craft-container {
        max-width: 1000px;
        margin: auto;
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        /*box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);*/
    }

    h1 { text-align: center; color: #2c3e50; }
    p { text-align: center; color: #7f8c8d; margin-bottom: 30px; }

    .craft-main-content {
        display: flex;
        gap: 30px;
    }

    .craft-input-area, .craft-output-area {
        flex: 1;
    }

    h3 { color: #34495e; border-bottom: 2px solid #ecf0f1; padding-bottom: 5px; }

    input[type="file"], textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }

    textarea { resize: vertical; }

    button {
        background-color: #3498db !important;
    color: white;
    border: none;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s;
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border-radius: 5px;
    box-sizing: border-box;
    display: block !important;
    position: relative;
    z-index: 1;
    }

    button:hover { background-color: #2980b9; }

    button:disabled {
        background-color: #95a5a6;
        cursor: not-allowed;
    }

    #imagePreview, #resultImage {
    width: 100%;
    border: 1px dashed #ccc;
    min-height: 180px;
    max-height: 350px;
    border-radius: 5px;
    object-fit: contain;
    background-color: #fafafa;
    display: block;
}

    .craft-loader {
        border: 8px solid #f3f3f3;
        border-radius: 50%;
        border-top: 8px solid #3498db;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
        margin: 100px auto;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
</style>


@section('content')
    <!-- Cart Area Start -->
    <div class="cart-main-area pt-100px pb-100px">
        <div class="craft-container">
            <h3 class="cart-page-title">Custom craft corner</h3>
            <div class="craft-container">
                <p>Where your sketches spark magic!
                    Upload your ideas and watch them turn into heartfelt, handcrafted gifts.</p>

                <div class="craft-main-content">
                    <div class="craft-input-area">
                        <h3>Upload Your Sketch</h3>
                        <input type="file" id="imageUpload" accept="image/*">
                        <img id="imagePreview" src="#" alt="Your sketch will appear here" />

                        <h3>Describe the Image</h3>
                        <textarea id="prompt" rows="4" placeholder="e.g., A photorealistic professional photo of a blue leather handbag, studio lighting"></textarea>

                        <button id="generateBtn">Show My Creation</button>
                    </div>

                    <div class="craft-output-area">
                        <h3>Your Generated Image</h3>
                        <div id="craft-loader" class="craft-loader" style="display: none;"></div>
                        <img id="resultImage" src="placeholder.png" alt="AI result will appear here" />
                    </div>
                </div>
            </div>


        </div>



    </div>
@endsection
@section('script')
<script>
    const API_URL = "https://1bd551e3b7ad.ngrok-free.app/generate";


// Get references to all the HTML elements
const imageUpload = document.getElementById('imageUpload');
const imagePreview = document.getElementById('imagePreview');
const promptInput = document.getElementById('prompt');
const generateBtn = document.getElementById('generateBtn');
const resultImage = document.getElementById('resultImage');
const loader = document.getElementById('craft-loader');

// Show a preview of the uploaded image
imageUpload.addEventListener('change', () => {
    const file = imageUpload.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            imagePreview.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});

// The main function to call the API
generateBtn.addEventListener('click', async () => {
    const imageFile = imageUpload.files[0];
    const promptText = promptInput.value;

    if (!imageFile) {
        alert("Please upload a sketch first!");
        return;
    }
    if (!promptText) {
        alert("Please enter a prompt!");
        return;
    }

    // Prepare the data to send
    const formData = new FormData();
    formData.append('image', imageFile);
    formData.append('prompt', promptText);

    // Show loader and disable button
    loader.style.display = 'block';
    /*resultImage.style.display = 'none';*/
    generateBtn.disabled = true;
    generateBtn.textContent = "Generating...";

    try {
        const response = await fetch(API_URL, {
            method: 'POST',
            body: formData, // No 'Content-Type' header needed; browser sets it for FormData
        });

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const data = await response.json();

        // Display the result
        // The backend sends a base64 string, which we can use as an image src
        resultImage.src = `data:image/png;base64,${data.image_base64}`;

    } catch (error) {
        console.error("Error:", error);
        alert("An error occurred. Please check the console and your API server.");
    } finally {
        // Hide loader and re-enable button
        loader.style.display = 'none';
        resultImage.style.display = 'block';
        generateBtn.disabled = false;
        generateBtn.textContent = "Show My Creation";
    }
});
    document.addEventListener('DOMContentLoaded', function () {
        $('.inc,.dec,input').on('click input',function () {
            var txt = $(this).text();
            var unitPrice = $(this).closest('tr').find('.product-price-cart').attr('data-amount')
            var qty = $(this).closest('tr').find('.product-quantity input').val()
            var productId = $(this).closest('tr').attr('data-product-id');
            $(this).closest('tr').find('.product-subtotal').text(`$${qty*unitPrice}`)

            //update cart
            $.ajax({
                url: 'cart/update',
                type: 'PUT',
                data: {
                    productId: productId,
                    qty:qty
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                complete:function (){
                    fetchCartItemCount();
                }
            });
        })
    });

    function deleteCartItem(obj,productId){
        $.ajax({
            url: 'cart/destroy',
            type: 'PUT',
            data: {
                productId: productId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                if (response.success) {
                    $(obj).closest('tr').remove();
                }
                $('#exampleModal-Cart').modal('show');
                $('#modelMessage').html('<i class="pe-7s-check"></i>' + response.message);
            },
            error: function(xhr) {
                var response = xhr.responseJSON;
                var errorMessage = response.message || 'An error occurred. Please try again.';
                $('#exampleModal-Cart').modal('show');
                $('#modelMessage').html('<i class="pe-7s-close"></i>' + errorMessage);
            },
            complete:function (){
                fetchCartItemCount();
            }
        });
    }

    function fetchCartItemCount() {
        $.ajax({
            url: '/cart/count',
            type: 'GET',
            success: function(response) {
                if (response.success) {
                    $('#itemCount').text(response.totalItemCount); // Update the cart item count in the UI
                } else {
                    console.log(response.message); // Log any error message
                }
            },
            error: function(xhr) {
                console.error('An error occurred:', xhr.responseText);
            }
        });
    }
</script>
@endsection
