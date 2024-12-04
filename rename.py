import os

i = 0
directory = './images'

for file_name in os.listdir(directory):
    if file_name.endswith('.jpg'):
        i += 1
        new_file_name = f'{i}.jpg'
        os.rename(os.path.join(directory, file_name), os.path.join(directory, new_file_name))