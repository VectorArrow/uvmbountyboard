INSERT IGNORE INTO Users (username, nickname, email, dateCreated)
VALUES ('swreinha', 'Samuel William Reinhardt', 'swr@outlook.com', NOW());
INSERT IGNORE INTO Admins (username, accesslevel)
VALUES ('swreinha', 0);
INSERT IGNORE INTO Alerts (username, keywords, location)
VALUES ('swreinha', 'phone', 'Central Campus');
INSERT IGNORE INTO Items (username, name, dateCreated, dateLost, category, description, location, status)
VALUES ('swreinha', 'Lost iPhone in construction zone', NOW(), NOW(), 'phones', 'silver iphone 4s with a pink case that says "too sexy" on back', 'Central Campus', 'lost');
