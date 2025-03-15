## **Work in Progress**
This repo is not stable, and should not be used yet


# Home Dashboard

This is a simple dashboard that I created to manage the family calendar, shopping list, and more. 

The dashboard uses Notion database to pull data from and is designed to run on a Raspberry Pi 4, but it should work on any system that can run Docker.


## Features
- Notion database integration
- Google Calendar integration
- Weather forecast
- Shopping list
- Todo list

## Screenshots

![Home Dashboard]()


## Installation



## Configure Integrations

### OpenWeatherMap

The dashboard uses OpenWeatherMap to pull the weather forecast. You will need to create an account and obtain an API key. -> [OpenWeatherMap](https://home.openweathermap.org/users/sign_up)

Add the following environment variable to the `.env` file.

```dotenv
OPENWEATHERMAP_API_KEY=
```

### Notion

The dashboard uses Notion databases to pull data from. You will need to create a Notion integration and obtain the API token. You will also need the database IDs for the shopping list, todo list, and meal plan.

Follow this link to create a new integration in Notion and obtain the API token.
[Notion Integrations](https://www.notion.so/my-integrations)

Add the following environment variables to the `.env` file.

```dotenv
NOTION_API_TOKEN=
NOTION_SHOPPING_DB_ID=
NOTION_MEALS_DB_ID=
NOTION_TODOS_DB_ID=
```

Set up the Notion databases for each feature with the following columns/properties. Then, replace the database IDs in the `.env` file.

1. Shopping List
    - Name: Title
    - Quantity: Text
    - Notes: Text
    - Completed: Checkbox
2. Todo List
    - Name: Title
    - Notes: Text
    - Due Date: Date
    - Completed: Checkbox
3. Meal Plan
    - Name: Title
    - Date: Date
    - Notes: Text

### Google Calendar

The dashboard uses Google Calendar to pull the family calendar. You will need to create a new project in the Google Cloud Console and obtain the client ID and client secret. -> [Google Cloud Console](https://console.cloud.google.com/)

Add the following environment variables to the `.env` file.

```dotenv
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
```

### Unsplash (for background images)

The dashboard uses Unsplash to pull background images. You will need to create an account and obtain an API key. -> [Unsplash](https://unsplash.com/developers)

Add the following environment variable to the `.env` file.

```dotenv
UNSPLASH_APP_ID=
UNSPLASH_ACCESS_KEY=
UNSPLASH_SECRET_KEY=
UNSPLASH_CALLBACK_URL=
```
