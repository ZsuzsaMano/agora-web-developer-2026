# Web Developer task 2026

You will receive two attachments along with this task:

- Template snippet (for Part 1)
- team_data.json data (for Parts 2 and 3)

Please use these files as the basis for your work.

## TASK

### 1. Code review / refactoring suggestions (PHP)

Based on the provided PHP template snippet, describe how you would improve this code.

You don’t have to write fully working code; a short write-up in .md, .pdf or .txt explaining your approach and/or showing small, refactored examples is enough.

### 2. Component design (UI/UX)

Using any tool you prefer, create a mock-up of: a) a team member card and b) a list of cards within a page based on the provided team data.

A screenshot or export of your mock-up, or a link to an online tool is sufficient.

### 3. Implementation (modern frontend)

Using any modern frontend tooling you prefer, implement your mock-up and display a list of team member cards using the provided team data.

Please include brief instructions in a README on how to run your solution. Your submission may be provided as a Git repository link, or a zipped project folder.

## Notes

Please don’t spend more than a few hours on this exercise; we’re more interested in your approach and reasoning than in perfect polish. 😊

## How to Run

1. Install dependencies: `npm install`
2. Start the development server: `npm run dev`
3. Open `http://localhost:5173` in your browser.

This project uses React, TypeScript, Vite, and Tailwind CSS.

## 📌 Notes on the Solution

### 1. Code review / refactoring (PHP)

See the attached document for my analysis and refactoring suggestions.

The focus is on improving:

- readability (reducing nested conditionals),
- maintainability (centralizing repeated logic) DRY,
- and separation of concerns (moving decision logic out of the template),

I created a commit for each step of my progress on this task.

### 2. Component design (UI / UX)

The mock-ups were created in Figma and are structured across three pages:  
https://www.figma.com/design/PfjXFBIVkEpDlVfgDFuwDk/Agora?node-id=2-4&m=dev&t=MFH1yi8V5d0mIcNa-1

- Elements – basic UI building blocks such as colors, typography
- Card – the team member card as a standalone component
- List – different layouts showing how the cards can be displayed within a page

Short comments were added directly in Figma to explain some design decisions.
More detailed reasoning is best discussed in person, as many decisions depend on broader context.

To make a final, data-informed design decision, access to Matomo analytics would be helpful, in particular:

- which devices users most commonly use,
- how often users click on cards or links,
- and how users typically navigate the team section.

Understanding actual user behavior would allow for more precise layout and interaction choices.
For this exercise, the design intentionally prioritizes simplicity, clarity, and reusability.

### 3. Implementation (frontend)

The implementation uses React, TypeScript, Vite, and Tailwind CSS.

- Team data is loaded from the provided team_data.json
- The team member card is implemented as a reusable component
- The list view renders cards by mapping over the data source
- Styling follows a component-first approach and matches the Figma mock-up

The goal of the implementation is not visual perfection, but to demonstrate:

- clean component structure,
- clear data flow,
- and an approach that could be easily adapted to another framework (e.g. Angular).

Instructions for running the project locally are included above.

**NOTE:**  
I used AI to structure and rephrase my thoughts into a readable format and style in the README.md file.
