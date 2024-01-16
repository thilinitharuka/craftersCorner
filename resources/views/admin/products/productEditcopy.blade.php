<!-- resources/views/products/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
<h1>Edit Product</h1>
<form action="{{ route('products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Your edit form fields go here -->
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" value="{{ $product->name }}">
    <br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description" value="{{ $product->description }}">
    <br>

    <label for="price">Price:</label>
    <input type="number" id="price" name="price" value="{{ $product->price }}">
    <br>

    <label for="category">Category:</label>
    <input type="text" id="category" name="category" value="{{ $product->category }}">
    <br>

    <!-- Add other fields as needed -->

    <button type="submit">Update Product</button>
</form>
</body>
</html>
