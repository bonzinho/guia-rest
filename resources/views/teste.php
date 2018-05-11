<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
<form id="form">
    <input type="text" name="name" value="Erik's bar">
    <input type="text" name="description" value="Melhor Wiski da região">
    <input type="file" name="photo" id="file">
</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">
    $('#file').on('change', function () {
        let formData = new FormData();
        formData.append('name', 'Erik\'s bar');
        formData.append('description', 'Melhor Wiski da região');
        formData.append('photo', $('#file')[0].files[0]);
        let headers = {
            'Authorization': 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjQwMGJlYTcyZmMxMjM3NzNkNWY1NTgzOTg1NmU3YmJkYzA1ZmZkMTJmOGRjNjczMTc1NTk1OWNjYTI1OTAxM2ExNzY4Y2UwMDVkM2U4N2NkIn0.eyJhdWQiOiI1IiwianRpIjoiNDAwYmVhNzJmYzEyMzc3M2Q1ZjU1ODM5ODU2ZTdiYmRjMDVmZmQxMmY4ZGM2NzMxNzU1OTU5Y2NhMjU5MDEzYTE3NjhjZTAwNWQzZTg3Y2QiLCJpYXQiOjE1MjUzNjM2NzcsIm5iZiI6MTUyNTM2MzY3NywiZXhwIjoxNTU2ODk5Njc3LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.WgEVc3WZ0I4bFrDJjDnZxAt-pIvjSB0-ZLosmFjAr8k942tXXQ-HZRYsDfqceSgUUcUp840LjaTr__41uHhwLzZVd4uhu1RofgoUtLXLaxQTbJ__ll-LpM1d6_QyMWrIFjHYdcUl9hn61qLPaqUjD6o2B7IaxdxrBmkeQbXAIxp7biqezOucIJq0bxkPPNeyI1h7Y1czQgI8jKLyYGNy9tVnJ4PNAwoxukGQXowZCK7iw7f1y9GP2kYCkm3SVteP0Xzw3dZ0j3OV_KDO7tWGQZAoJ3Kmb-0PEko2McmUfTFDtG2Vlv6f2ZXa1a_AZRCUJlfG670BXbNEXrlU4vKVeo9oxKbmAfFrSjOrXwRWZyIbi0acwedXPolT4qd_T2Ib7_WriWtxBFEI7ofdceWixwYhZ-hTXwSVGic8VBvLtk2u6ReOwfKFDJpXOCCHgHJleXkhWh31hxugv_sgQ5WBQzOgpl4OY9h8B1BEqF2FPES_TTUhTSwYqk3o_OGDZWyG9HGqi_z1rUjBZ7LGaz-svsJQbPNOnsP-zWVGVyswjQcUOvhs8_98bcu-q0LXIBkYVoPpq5dZ3Yqh7BkhY45Epj85sSzNPqCrvPV5CvvWQ1fjSUNnbj3P0jiG6E_pIA5rR7SE1HZYvrrTwFYrYFU_JYK0SIoDzvGoEFwACUmFrvM',
            //'content-type': 'multipart/form-data'
            'content-type': 'application/x-www-form-urlencoded'
        }
        axios.post('http://localhost:8000/api/v1/restaurants/1', formData, {headers: headers})
    })
</script>
</body>
</html>