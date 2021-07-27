{
  "nbformat": 4,
  "nbformat_minor": 0,
  "metadata": {
    "colab": {
      "name": "SentimentAnalysis.py",
      "provenance": [],
      "authorship_tag": "ABX9TyMeu4S1h/fWMxnk8+cxzlDp",
      "include_colab_link": true
    },
    "kernelspec": {
      "name": "python3",
      "display_name": "Python 3"
    }
  },
  "cells": [
    {
      "cell_type": "markdown",
      "metadata": {
        "id": "view-in-github",
        "colab_type": "text"
      },
      "source": [
        "<a href=\"https://colab.research.google.com/github/AanchalSingh-star/Aanchal-Singh/blob/main/SentimentAnalysis.py\" target=\"_parent\"><img src=\"https://colab.research.google.com/assets/colab-badge.svg\" alt=\"Open In Colab\"/></a>"
      ]
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "jP9Qsey83w96"
      },
      "source": [
        "#Description : This is a sentiment analysis program that parses the tweets fetched from twitter using python."
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "cK0tEcpJ4tiX"
      },
      "source": [
        "#import the liberaries\n",
        "import tweepy\n",
        "from textblob import TextBlob\n",
        "from wordcloud import WordCloud\n",
        "import pandas as pd\n",
        "import numpy as np\n",
        "import re\n",
        "import matplotlib.pyplot as plt\n",
        "plt.style.use('fivethirtyeight')"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "8m3iPtz54zob"
      },
      "source": [
        "# twitter API credentials\n",
        "consumerKey = 'wPOT0YxSxcfgUi34HdSEABr4t'\n",
        "consumerSecret = 'jKVZEERwR0ATEDy8my01P6De7MxTL9KXrOq2pkiu5a7EBi9kfZ'\n",
        "accessToken = '1336178314310868992-yE3XYhDNj7xYAP8xQhj6uLuGuQvYET'\n",
        "accessTokenSecret = 'TP5qXUcz1SHMjEswEHEdhgwpvLQsCKffN5V7KIFuqXSj9'"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "zkiPVWt95AYd"
      },
      "source": [
        "# Create the authentication object\n",
        "authenticate = tweepy.OAuthHandler(consumerKey, consumerSecret)\n",
        "\n",
        "# Set the access token and access token secret\n",
        "authenticate.set_access_token(accessToken, accessTokenSecret)\n",
        "\n",
        "# Create the API object while passing in the auth information\n",
        "api = tweepy.API(authenticate, wait_on_rate_limit = True)"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "Ar8QbysY5IH6"
      },
      "source": [
        "# Extract 100 tweets from the twitter user\n",
        "posts = api.user_timeline(screen_name = \"BillGates\", count = 100, lang = \"en\", tweet_mode = \"extended\")\n",
        "\n",
        "# Print the last 5 tweets from the account\n",
        "print(\"Show the 5 recent tweets: \\n\")\n",
        "i =1\n",
        "for tweet in posts[0:5]:\n",
        "  print(str(i) + ') '+ tweet.full_text + '\\n')\n",
        "  i+=1"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "WB846V4X5Po7"
      },
      "source": [
        "# Create a dataframe with a column called tweets\n",
        "df = pd.DataFrame([tweet.full_text for tweet in posts] , columns = ['Tweets'])\n",
        "\n",
        "# Show the first five rows of data\n",
        "df.head()"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "hlzHKweN5cUo"
      },
      "source": [
        "# Clean the text\n",
        "\n",
        "# Create a function to clean the tweets\n",
        "def cleanTxt(text):\n",
        "  text = re.sub(r'@[A-Za-z0-9]+', '', text) #Removed @mentions\n",
        "  text = re.sub(r'#', '', text) #Removing the # symbol\n",
        "  text = re.sub(r'RT[\\s]+', '', text) #Removing RT\n",
        "  text = re.sub(r'https?:\\/\\/\\S+', '', text) #Remove the hyper link\n",
        "\n",
        "  return text\n",
        "\n",
        "df['Tweets']= df['Tweets'].apply(cleanTxt)\n",
        "\n",
        "#Show the cleaned text\n",
        "df"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "vjtQ3fdW5nVN"
      },
      "source": [
        "# Create a function to get the subjectivity\n",
        "def getSubjectivity(text):\n",
        "  return TextBlob(text).sentiment.subjectivity\n",
        "\n",
        "# Create a function to get the polarity\n",
        "def getPolarity(text):\n",
        "  return TextBlob(text).sentiment.polarity\n",
        "\n",
        "#Create two new columns\n",
        "df['Subjectivity'] = df['Tweets'].apply(getSubjectivity)\n",
        "df['Polarity'] = df['Tweets'].apply(getPolarity)\n",
        "\n",
        "#Show the new dataframe with the new columns\n",
        "df"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "8DAfujCG50Xr"
      },
      "source": [
        "# Plot The Word Cloud\n",
        "allWords = ''.join([twts for twts in df['Tweets']] )\n",
        "wordCloud = WordCloud(width = 500, height = 300, random_state = 21, max_font_size = 119).generate(allWords)\n",
        "\n",
        "plt.imshow(wordCloud, interpolation = \"bilinear\")\n",
        "plt.axis('off')\n",
        "plt.show()"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "QJK-RjTe57h3"
      },
      "source": [
        "# Create a function to compute the negative, neutral and positive analysis\n",
        "def getAnalysis(score):\n",
        "  if score < 0:\n",
        "    return 'Negative'\n",
        "  elif score == 0:\n",
        "    return 'Neutral'\n",
        "  else:\n",
        "    return 'Positive'\n",
        "\n",
        "df['Analysis'] = df['Polarity'].apply(getAnalysis)\n",
        "\n",
        "#Show the dataframe\n",
        "df"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "eLYvoow26C35"
      },
      "source": [
        "# Print all of the positive tweets\n",
        "j=1\n",
        "sortedDF = df.sort_values(by =['Polarity'])\n",
        "for i in range(0, sortedDF.shape[0]):\n",
        "  if (sortedDF['Analysis'][i] == 'Positive'):\n",
        "    print(str(j) +') '+sortedDF['Tweets'][i])\n",
        "    print()\n",
        "    j+=1"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "0fazEU8h6L6U"
      },
      "source": [
        "# Print the negative Tweets\n",
        "j=1\n",
        "sortedDF = df.sort_values(by=['Polarity'], ascending='False')\n",
        "for i in range(0, sortedDF.shape[0]):\n",
        "  if(sortedDF['Analysis'][i] == 'Negative'):\n",
        "    print(str(j) + ') ' +sortedDF['Tweets'][i])\n",
        "    print()\n",
        "    j+=1"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "GE-XoLi56TXO"
      },
      "source": [
        "#Plot the polarity and subjectivity\n",
        "plt.figure(figsize =(8,6))\n",
        "for i in range(0, df.shape[0]):\n",
        "  plt.scatter(df['Polarity'][i], df['Subjectivity'][i], color = 'Blue')\n",
        "\n",
        "plt.title('Sentiment Analysis')\n",
        "plt.xlabel('Polarity')\n",
        "plt.ylabel('Subjectivity')\n",
        "plt.show()"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "380Cm8Rb6cpX"
      },
      "source": [
        "# Get the percentage of positive tweets\n",
        "ptweets = df[df.Analysis == 'Positive']\n",
        "ptweets = ptweets['Tweets']\n",
        "\n",
        "round((ptweets.shape[0] / df.shape[0]) *100,1)"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "T0hQzVZC6jTP"
      },
      "source": [
        "# Get the percentage of negative tweets\n",
        "ntweets = df[df.Analysis == 'Negative']\n",
        "ntweets = ntweets['Tweets']\n",
        "\n",
        "round((ntweets.shape[0] / df.shape[0]) *100, 1)"
      ],
      "execution_count": null,
      "outputs": []
    },
    {
      "cell_type": "code",
      "metadata": {
        "id": "1CkSh0fD6r4i"
      },
      "source": [
        "#Show the value counts\n",
        "\n",
        "df['Analysis'].value_counts()\n",
        "\n",
        "#plot and visualize the counts\n",
        "plt.title('Sentiment Analysis')\n",
        "plt.xlabel('Sentiment')\n",
        "plt.ylabel('Counts')\n",
        "df['Analysis'].value_counts().plot(kind = 'bar')\n",
        "plt.show()"
      ],
      "execution_count": null,
      "outputs": []
    }
  ]
}