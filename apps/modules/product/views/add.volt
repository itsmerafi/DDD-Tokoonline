{% extends 'layout.volt' %}

{% block title %}Add New Product{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

<div class="idea">
    <div class="card">
        <div class="card-body">
            <form action="{{url('/product/product/add')}}" method="POST">
                <div class="form-group">
                    <label for="">Product Name</label>
                    <input type="text" class="form-control" name="productName" required>
                    <label for="">Product Description</label>
                    <textarea name="productDescription" id="" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input type="text" class="form-control" name="productQuantity" required>
                    <label for="">Price</label>
                    <input type="text" class="form-control" name="productPrice" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>

{% endblock %}

{% block scripts %}

{% endblock %}