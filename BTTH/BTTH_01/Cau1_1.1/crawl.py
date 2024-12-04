from bs4 import BeautifulSoup
import requests
import os
import shutil

url = "https://afamily.vn/14-loai-hoa-tuyet-dep-thich-hop-trong-de-khoe-huong-sac-dip-xuan-he-2016030408550765.chn"
response = requests.get(url)
soup = BeautifulSoup(response.content, 'html.parser')

# Giả sử title nằm trong thẻ h4 có class là "title"
title = soup.find('span', style="font-weight: bold;").text

# Giả sử description nằm trong thẻ div có style là "text-align: justify;"
description = soup.find('div', style="text-align: justify;").text

# Tạo thư mục /images nếu chưa tồn tại
if not os.path.exists('images'):
    os.makedirs('images')

# Tìm tất cả các thẻ img có style chứa "max-width:100%;"
images = soup.find_all('img', style="max-width:100%;")

# Lưu tất cả hình ảnh vào thư mục /images
for img in images:
    image_url = img['src']
    image_response = requests.get(image_url, stream=True)
    image_path = os.path.join('images', os.path.basename(image_url))
    with open(image_path, 'wb') as out_file:
        shutil.copyfileobj(image_response.raw, out_file)
    del image_response

    # Lưu dữ liệu vào data.php dưới dạng mảng flowers chứa title, image và description
    with open('data.php', 'w', encoding='utf-8') as file:
        file.write("<?php\n")
        file.write("$flowers = array(\n")
        file.write("    'title' => '{}',\n".format(title))
        file.write("    'description' => '{}',\n".format(description))
        file.write("    'images' => array(\n")
        for img in images:
            image_url = img['src']
            file.write("        '{}',\n".format(image_url))
        file.write("    )\n")
        file.write(");\n")
        file.write("?>")