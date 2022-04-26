import requests
from bs4 import BeautifulSoup
import pandas as pd


baseurl = 'https://damndelicious.net/'

headers = {
    'User-Agent' : 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/98.0.4758.87 Safari/537.36'
}
#Requests from breakfast page and iterates through all 6 pages/127 recipes.
productlinks = []
for x in range(1,11):
    r = requests.get(f'https://damndelicious.net/category/appetizer/page/{x}/')
    # r = requests.get('https://damndelicious.net/category/appetizer/')
    soup = BeautifulSoup(r.content, 'lxml')

    productlist = soup.find_all('div', class_='archives')

    for item in productlist:
        for link in item.find_all('a',href=True):
        
            productlinks.append(baseurl + link['href'])





dinnerlist = []
for link in productlinks:
    r = requests.get(link, headers = headers)
    soup = BeautifulSoup(r.content, 'lxml')
    recipename =  soup.find('h1', class_='post-title')
    Image = soup.find('img',class_='photo nopin' )
    servings = soup.select_one(".post-meta.time p:nth-child(1) span")
    preptime = soup.select_one(".post-meta.time p:nth-child(2) span")
    UrlLinks = soup.find('a',href=True)
   

    dictionary = {
        'recipe name':recipename,
        'recipe image':Image,
        'serving size':servings,
        'prep time':preptime,
        'UrlLinks':link,
    }
   
    dinnerlist.append(dictionary)
    
    # print('Saving: ', dictionary['UrlLinks'])
df = pd.DataFrame(dinnerlist)

# print(df.head(15))
# print(recipename,'\n',servings,'\n')
#print(Instructions)
# result = df.to_html()
# print(result)


df.to_csv('appetizer.csv')

df_saved_file = pd.read_csv('appetizer.csv')
df_saved_file
