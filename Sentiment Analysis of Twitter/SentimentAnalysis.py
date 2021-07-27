
In [ ]:
#Description : This is a sentiment analysis program that parses the tweets fetched from twitter using python.
In [ ]:
#import the liberaries
import tweepy
from textblob import TextBlob
from wordcloud import WordCloud
import pandas as pd
import numpy as np
import re
import matplotlib.pyplot as plt
plt.style.use('fivethirtyeight')
In [ ]:
# twitter API credentials
consumerKey = 'wPOT0YxSxcfgUi34HdSEABr4t'
consumerSecret = 'jKVZEERwR0ATEDy8my01P6De7MxTL9KXrOq2pkiu5a7EBi9kfZ'
accessToken = '1336178314310868992-yE3XYhDNj7xYAP8xQhj6uLuGuQvYET'
accessTokenSecret = 'TP5qXUcz1SHMjEswEHEdhgwpvLQsCKffN5V7KIFuqXSj9'
In [ ]:
# Create the authentication object
authenticate = tweepy.OAuthHandler(consumerKey, consumerSecret)

# Set the access token and access token secret
authenticate.set_access_token(accessToken, accessTokenSecret)

# Create the API object while passing in the auth information
api = tweepy.API(authenticate, wait_on_rate_limit = True)
In [ ]:
# Extract 100 tweets from the twitter user
posts = api.user_timeline(screen_name = "BillGates", count = 100, lang = "en", tweet_mode = "extended")

# Print the last 5 tweets from the account
print("Show the 5 recent tweets: \n")
i =1
for tweet in posts[0:5]:
  print(str(i) + ') '+ tweet.full_text + '\n')
  i+=1
In [ ]:
# Create a dataframe with a column called tweets
df = pd.DataFrame([tweet.full_text for tweet in posts] , columns = ['Tweets'])

# Show the first five rows of data
df.head()
In [ ]:
# Clean the text

# Create a function to clean the tweets
def cleanTxt(text):
  text = re.sub(r'@[A-Za-z0-9]+', '', text) #Removed @mentions
  text = re.sub(r'#', '', text) #Removing the # symbol
  text = re.sub(r'RT[\s]+', '', text) #Removing RT
  text = re.sub(r'https?:\/\/\S+', '', text) #Remove the hyper link

  return text

df['Tweets']= df['Tweets'].apply(cleanTxt)

#Show the cleaned text
df
In [ ]:
# Create a function to get the subjectivity
def getSubjectivity(text):
  return TextBlob(text).sentiment.subjectivity

# Create a function to get the polarity
def getPolarity(text):
  return TextBlob(text).sentiment.polarity

#Create two new columns
df['Subjectivity'] = df['Tweets'].apply(getSubjectivity)
df['Polarity'] = df['Tweets'].apply(getPolarity)

#Show the new dataframe with the new columns
df
In [ ]:
# Plot The Word Cloud
allWords = ''.join([twts for twts in df['Tweets']] )
wordCloud = WordCloud(width = 500, height = 300, random_state = 21, max_font_size = 119).generate(allWords)

plt.imshow(wordCloud, interpolation = "bilinear")
plt.axis('off')
plt.show()
In [ ]:
# Create a function to compute the negative, neutral and positive analysis
def getAnalysis(score):
  if score < 0:
    return 'Negative'
  elif score == 0:
    return 'Neutral'
  else:
    return 'Positive'

df['Analysis'] = df['Polarity'].apply(getAnalysis)

#Show the dataframe
df
In [ ]:
# Print all of the positive tweets
j=1
sortedDF = df.sort_values(by =['Polarity'])
for i in range(0, sortedDF.shape[0]):
  if (sortedDF['Analysis'][i] == 'Positive'):
    print(str(j) +') '+sortedDF['Tweets'][i])
    print()
    j+=1
In [ ]:
# Print the negative Tweets
j=1
sortedDF = df.sort_values(by=['Polarity'], ascending='False')
for i in range(0, sortedDF.shape[0]):
  if(sortedDF['Analysis'][i] == 'Negative'):
    print(str(j) + ') ' +sortedDF['Tweets'][i])
    print()
    j+=1
In [ ]:
#Plot the polarity and subjectivity
plt.figure(figsize =(8,6))
for i in range(0, df.shape[0]):
  plt.scatter(df['Polarity'][i], df['Subjectivity'][i], color = 'Blue')

plt.title('Sentiment Analysis')
plt.xlabel('Polarity')
plt.ylabel('Subjectivity')
plt.show()
In [ ]:
# Get the percentage of positive tweets
ptweets = df[df.Analysis == 'Positive']
ptweets = ptweets['Tweets']

round((ptweets.shape[0] / df.shape[0]) *100,1)
In [ ]:
# Get the percentage of negative tweets
ntweets = df[df.Analysis == 'Negative']
ntweets = ntweets['Tweets']

round((ntweets.shape[0] / df.shape[0]) *100, 1)
In [ ]:
#Show the value counts

df['Analysis'].value_counts()

#plot and visualize the counts
plt.title('Sentiment Analysis')
plt.xlabel('Sentiment')
plt.ylabel('Counts')
df['Analysis'].value_counts().plot(kind = 'bar')
plt.show()