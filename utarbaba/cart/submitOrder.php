<form method='post' id='submitOrder'>
    <h5>Table Number</h5>
    <br>
    <select name="tableNum">
        <option value="1" selected="">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="Takeaway">Takeaway</option>
    </select>
    <br>

    <h5>Payment Method</h5>
    <br>
    <select name="payMethod">
        <option value="TNG" selected="">Touch & Go Ewallet</option>
        <option value="GrabPay">GrabPay</option>
        <option value="Bank Transfer">Bank Transfer</option>
        <option value="Credit Card">Credit Card</option>
        <option value="Cash">Pay by Cash at Counter</option>
    </select>
    
    <br><br>

    <button class='orderButton' onclick='submitOrder()' href="/utarbaba/cart/submit.php"> Submit Order</button>
    <input type='hidden' name='task' value='submitOrder'>
</form>

<script>
    function submitOrder() { // Submit the form when the button is clicked
		document.getElementById('submitOrder').submit();
	}
</script>