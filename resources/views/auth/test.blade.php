<form action="{{action('UserController@getLocation')}}" method="POST">
    @csrf
    <select name="country_code">
        <option value="PK">PK</option>
        <option value="PH">PH</option>
        <option value="US">US</option>
        <option value="UK">UK</option>
        <option value="IN">IN</option>
    </select>
    <input type="text" name="postal">
    <input type="submit">
</form>
