async function data_taker(request_type = 0, filter = [], require_login = 0) {
    var data = await fetch(`http://localhost/notes_system/code/data_taker.php?request_type=${request_type}&` + (request_type == 1 ? `filter=${encodeURIComponent(JSON.stringify(filter))}` : `require_login=${require_login}`))
    data = await data.json()
    return data
}
