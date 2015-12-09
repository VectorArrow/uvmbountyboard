INSERT IGNORE INTO Users (username, nickname, email, dateCreated)
VALUES ('swreinha', 'Samuel William Reinhardt', 'swr@outlook.com', NOW()),
	('test','test user please delete me oh go why am i alive', 'test@test.com', NOW());
INSERT IGNORE INTO Admins (username, accesslevel)
VALUES ('swreinha', 0),
VALUES ('rerickso', 0),
VALUES ('afdrisco', 0),
VALUES ('mcardoso', 0),
VALUES ('gsamsono', 0),
VALUES ('adatta', 0);
INSERT IGNORE INTO Alerts (username, keywords, location)
VALUES ('swreinha', 'phone', 'Central Campus');
INSERT IGNORE INTO Items (username, name, dateCreated, dateLost, category, description, location, status, image)
VALUES ('swreinha', 'green pants with stripes', NOW(), NOW(), 'clothes', 'can\'t find my favorite half plaid pants with green stripes on one side and solid black on other need for wedding please help thanks', 'Trinity Campus','Lost', 'pants.jpg'),
 ('test', 'Cat snake', NOW(), NOW(), 'pets', 'Found this weird cat snake thing running around my apartment. Smells weird. Assuming pet, please come get it. This is the best picture I could get, it moves so fast.', 'Athletic Campus', 'Found', 'cat-snake.jpg'),
 ('swreinha', 'Lost iPhone in construction zone', NOW(), NOW(), 'phones', 'silver iphone 4s with a pink case that says "I heart pink" on back', 'Central Campus', 'Lost', 'iphone-missing.jpg'),
 ('swreinha', 'Marbles', NOW(), NOW(), 'other', 'marbles are missing - will pay $100 for their return', 'Central Campus', 'Lost', 'marbles.jpg'),
 ('swreinha', 'Backpack in corner of room after Math', NOW(), NOW(), 'clothing', 'Backpack found in Room 100 Votey, has some kind of alien thing sewn on it and the name "Caesar"', 'Central Campus', 'Found', 'backpack.jpg'),
 ('swreinha', 'Cannot find handmade blanket', NOW(), NOW(), 'other', 'I put all of my hexagons into it and now I have none left.', 'Central Campus', 'Lost', 'blanket.jpg'),
 ('swreinha', 'Shark Hat', NOW(), NOW(), 'Clothing', 'My shark hat is missing, it is not the same as in the picture, but it is almost the same mine is bigger.', 'East Annex', 'Lost', 'hat.jpg'),
 ('swreinha', 'Turtle ran away', NOW(), NOW(), 'pets', 'Wood turtle got out of its cage, is now on the loose.', 'Central Campus', 'Lost', 'turtle.jpg')
;
