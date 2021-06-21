<form action="#" method="post" class="add-to-cart">
    <input type="hidden" name="slug" value="{{ $product->slug }}">
    <input type="hidden" name="amount" value="1">
    <input type="hidden" name="url_image" value="{{ $product->url_image }}">
    <input type="hidden" name="name" value="{{ $product->name }}">
    <input type="hidden" name="price" value="{{ $product->price }}">
    <input type="hidden" name="price_promotion" value="{{ $product->price_promotion }}">
    <input type="hidden" name="id" value="{{ $product->id }}">
    <input type="submit" name="submit" value="{{ __('common.add_to_cart') }}" class="button">
</form>