INSERT IGNORE INTO Users (username, nickname, email, dateCreated)
VALUES ('swreinha', 'Samuel William Reinhardt', 'swr@outlook.com', NOW()),
	('test','test user please delete me oh go why am i alive', 'test@test.com', NOW());
INSERT IGNORE INTO Admins (username, accesslevel)
VALUES ('swreinha', 0);
INSERT IGNORE INTO Alerts (username, keywords, location)
VALUES ('swreinha', 'phone', 'Central Campus');
INSERT IGNORE INTO Items (username, name, dateCreated, dateLost, category, description, location, status)
VALUES ('swreinha', 'green pants with stripes', NOW(), NOW(), 'clothes', 'can\'t find my favorite green pants with red and transparent stripes need for wedding please help thanks', 'Trinity Campus','lost'),
 ('test', 'Cat snake', NOW(), NOW(), 'pets', 'Found this weird cat snake thing running around my apartment', 'Athletic Campus', 'found'),
 ('swreinha', 'Lost iPhone in construction zone', NOW(), NOW(), 'phones', 'silver iphone 4s with a pink case that says "too sexy" on back', 'Central Campus', 'lost'),
 ('swreinha', 'Marbles', NOW(), NOW(), 'other', 'marbles are missing - will pay $100 for hteier return', 'Central Campus', 'lost')
;
